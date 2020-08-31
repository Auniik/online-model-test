<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.switch', [
            'switches' => Setting::query()
                ->where('context', 'switch')
                ->get(['key', 'id', 'value'])
        ]);
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->update([
            'value' => $request->value
        ]);
        return response([
            'status' => true,
            'message' => 'সেটিংস আপডেট করা হয়েছে!'
        ]);
    }
}
