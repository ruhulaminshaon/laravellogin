<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangepasswordController extends Controller
{

   public function index(Request $request)
   {
   	$this->validate($request,[
   		'oldpassword' => 'required',
   		'password' => 'required|confirmed',
   	]);
   	$hashedPassword = Auth::user()->password;
   	if(Hash::check($request->oldpassword,$hashedPassword))
   	{
   		$user = User::find( Auth::id() );
   		$user->password = Hash::make($request->password);
   		$user->save();
   		Auth::logout();
   		return redirect()->route('login')->with('success','Password is change Successfully');
   	}
   	else
   	{
   		return back()->with('errorMsg','Current Password is invalid');
   	}
   }

}
