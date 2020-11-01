<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Post;

class UserController extends Controller
{
   public function profile(){
       $posts =  Post::where('user_id', '=', Auth::user()->id)->get();
      
       return view('profile', array('user' =>  Auth::user(), 'posts' =>$posts));
   }

   public function update_avatar(Request $request){
       // Handle user avatar upload
       if($request->hasFile('avatar')){
           $avatar = $request->file('avatar');
           $filename = time() . '.' . $avatar->getClientOriginalExtension();
           Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ) );

           $user = Auth::user();
           $user->avatar = $filename;
           $user->save();
       }

       return view('profile', array('user' =>  Auth::user()));
   }
}
