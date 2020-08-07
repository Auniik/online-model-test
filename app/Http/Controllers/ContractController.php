<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
use Illuminate\Http\Request;


class ContractController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function editContract(){
        $contract = Contract::query()->first();
        return view('admin.contact.edit-contact',[
            'contract' => $contract,
        ]);
    }

    public function updateContract(Request $request){
        $contract = Contract::query()->first();
        if ($request->has('image'))
        {
            $contactImage = $request->file('image');
            $directory = "about-image/";
            $imageName = Str::random(40) ."." . $contactImage->getClientOriginalExtension();
            //$aboutImage->move($directory,$imageName);
            $imageUrl = $directory.$imageName;
            Image::make($contactImage)->resize(1500, 400)->save($imageUrl);
            Storage::delete($contract->image);
        } else {
            $imageUrl = $contract->image;
        }

        $contract->title                = $request->title;
        $contract->description          = $request->description;
        $contract->address              = $request->address;
        $contract->phone                = $request->phone;
        $contract->email                = $request->email;
        $contract->image                = $imageUrl;
        $contract->save();
        return redirect('/edit-contact');
    }
}
