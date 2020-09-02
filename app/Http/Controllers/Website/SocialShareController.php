<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;

use Share;
use Illuminate\Http\Request;

class SocialShareController extends Controller
{
    public function show(Request $request)
    {
        $url = $request->url == 'undefined' ? url('/') : $request->get('url', url('/'));

        return view('front._partials.share-social-icons', [
            'url' => (object)Share::load($url, 'TekasaiBD.com')->services()
        ]);
    }
}
