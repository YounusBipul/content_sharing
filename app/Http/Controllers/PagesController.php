<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Story; 
use DB;

class PagesController extends Controller
{
    // 
    public function index(){
        
        //return view('welcome');
        return view('homepage');
    }
    
    public function usermanual(){
        return view('usermanual');
    }
    public function storecomment(Request $request)
    {
        $this->validate($request , [
            'comment' => 'required',
          
        ]);
        
        $comment= new Comment;
        $comment->comment= $request->input('comment');
        $comment->story_id= $request->input('story_id');
        $comment->user_id= auth()->user()->id;
       
        $comment->save();
        
        //$story= Story::find($comment->story_id);
        $story= DB::select("select sections.section_name, sections.id, users.name, users.id as story_teller, stories.id, stories.image_name, stories.title, stories.body, stories.block from users,stories,sections WHERE users.id=stories.user_id and stories.section_id=sections.id and stories.id=".$comment->story_id);
        
        $comments= Comment::where('story_id', $comment->story_id)->get();
        $comments= DB::select("select * from users,stories,comments WHERE comments.user_id=users.id and comments.story_id=stories.id and comments.story_id=".$comment->story_id);
        return view('story.viewstory',['story'=>$story, 'comments'=>$comments]);
      
       
    }

    public function blockstory(Request $request)
    {
   
        $story= Story::find($request->input('story_id'));
        $story->block= '1';
        $story->save();

        $stories=Story::where('block', '0')->get();
        $stories=$stories->sortByDesc('id');
        return view('story.stories',['stories'=>$stories]);
      
       
    }
}
