<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{

    public function index()
    {
        return view('admin.teams.index', [
            'team_members' => TeamMember::query()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'designation' => 'nullable',
            'image' => 'required',
            'short_message' => 'nullable',
            'message' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'nullable',
            'instagram_link'=> 'nullable'
        ]);

        $attributes['image'] = $request->image->store('uploads/teams');

        if (!TeamMember::query()->count()) {
            $attributes['is_highlighted'] = 1;
        }
        TeamMember::query()->create($attributes);
        return redirect('/team-members')->withSuccess(' টিম মেম্বার যোগ করা সফল হয়েছে!');
    }

    public function show(TeamMember $member) //frontend
    {
        return view('front.team-member.show', [
            'member' => $member
        ]);
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.teams.edit', [
            'team_member' => $teamMember
        ]);
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'designation' => 'nullable',
            'image' => 'nullable',
            'short_message' => 'nullable',
            'message' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'nullable',
            'instagram_link'=> 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $attributes['image'] = $request->image->store('uploads/teams');
            Storage::delete($teamMember->image);
        }

        $teamMember->update($attributes);
        return redirect('/team-members')->withSuccess(' টিম মেম্বার  হালনাগাদ করা হয়েছে!');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->is_highlighted) {
            $member = TeamMember::query()->latest()->first();
            if ($member){
                $member->update(['is_highlighted' => 1]);
            }
        }
        Storage::delete($teamMember->image);
        $teamMember->delete();
        return [
            'check' => 'true'
        ];

    }

    public function highlight(TeamMember $teamMember)
    {
        TeamMember::query()->where('is_highlighted', 1)->update([
            'is_highlighted' => 0
        ]);

        $teamMember->update([
            'is_highlighted' => 1
        ]);
        return back()->withSuccess('টীম মেম্বার হাইলাইট করা হয়েছে');
    }

}
