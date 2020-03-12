<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use DB;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
        //$comments= Comment::where('story_id', $comment->story_id)->get();
        $comments= DB::select("select * from users,stories,comments WHERE comments.user_id=users.id and comments.story_id=stories.id and comments.story_id=".$comment->story_id);
        return view('story.viewstory',['story'=>$story, 'comments'=>$comments]);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::find($id);
        $s_id=$comment->story_id;
        $comment->delete();

        $story= DB::select("select sections.section_name, sections.id, users.name, users.id as story_teller, stories.id, stories.image_name, stories.title, stories.body, stories.block from users,stories,sections WHERE users.id=stories.user_id and stories.section_id=sections.id and stories.id=".$s_id);
        
        $comments= DB::select("select * from users,stories,comments WHERE comments.user_id=users.id and comments.story_id=stories.id and comments.story_id=".$s_id);
        return view('story.viewstory',['story'=>$story, 'comments'=>$comments]);
    }
}
