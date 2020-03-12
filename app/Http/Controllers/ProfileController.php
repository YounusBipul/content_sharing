<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
class ProfileController extends Controller
{
    //
    public function profile($id){
        
        //return view('welcome');
        $user= User::find($id);
        return view('profile.profile', ['user'=> $user]);
    }
    public function editprofile($id){
        
        //return view('welcome');
        $user= User::find($id);
        return view('profile.editprofile', ['user'=> $user]);
    }

    public function update(Request $request)
    {
        //
        $user= User::find($request->input('user_id'));
      
        $user->name= $request->input('name');
        $user->email= $request->input('email');
        $user->date_of_birth= $request->input('date_of_birth');
        $user->gender= $request->input('gender');
        $user->phone= $request->input('phone');
        $user->save();

        return view('profile', ['user'=> $user, 'success'=>'Your profile has been updated sucessfully']);

    }
    public function profilestories($id){
        
        //return view('welcome');
        $stories= DB::select("select sections.section_name, sections.id,users.name, stories.image_name, stories.id, stories.title, stories.body, stories.block, stories.id as s_id from users,stories,sections WHERE users.id=stories.user_id and stories.section_id=sections.id and users.id=".$id." order by stories.id desc");
        return view('story.stories',['stories'=>$stories]);
    }
}
