<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return View('profiles.index', [
            'users' => Auth::User(),
        ]);
    }

    public function upload(Request $request)
    {

    	if($request->hasFile('images')) {
    		// dd('test');
    		$image = $request->file('images');
    		$filename = time() . '.' . $image->getClientOriginalExtension();
    		Image::make($image)->resize(300, 300)->save( public_path('/uploads/'. $filename));

    		$user = Auth::user();
    		$user->image = $filename;
    		$user->save();
    	}
    	return redirect()->route('profiles');
    }
}


