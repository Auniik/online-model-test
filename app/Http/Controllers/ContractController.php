<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Support\Facades\Mail;
use Image;
use Illuminate\Http\Request;


class ContractController extends Controller
{
    public function addContact(){
        $contacts = Contract::all();
        return view('admin.contact.add-contact',[
            'contacts' => $contacts,
        ]);

    }
    public function newContract(Request $request){

        $contactImage = $request->file('image');
        $directory = "about-image/";
        $imageName = $contactImage->getClientOriginalName();
        $contactImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;

        $contract = new Contract();
        $contract->title                = $request->title;
        $contract->description          = $request->description;
        $contract->address              = $request->address;
        $contract->phone                = $request->phone;
        $contract->email                = $request->email;
        $contract->image                = $imageUrl;
        $contract->save();
        return redirect('add-contact')->with('message','Contact Save Successfully');
    }
    public function editContract($id){
        $contract = Contract::find($id);
        return view('admin.contact.edit-contact',[
            'contract' => $contract,
        ]);
    }
    public function updateContract(Request $request){

        $contactImage = $request->file('image');
        $directory = "about-image/";
        $imageName = $contactImage->getClientOriginalName();
        //$aboutImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;
        Image::make($contactImage)->resize(1500, 400)->save($imageUrl);

        $contract = Contract::find($request->id);
        $contract->title                = $request->title;
        $contract->description          = $request->description;
        $contract->address              = $request->address;
        $contract->phone                = $request->phone;
        $contract->email                = $request->email;
        $contract->image                = $imageUrl;
        $contract->save();
        return redirect('/add-contact');
    }
}
