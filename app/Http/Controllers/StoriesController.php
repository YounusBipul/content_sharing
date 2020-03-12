<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Section;
use App\Comment;
use DB;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function __construct ()
    {
        //$this->middleware('auth', ['except'=>['stories', 'viewstory']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$stories=Story::where('block', '0')->get();
        //$stories=$stories->sortByDesc('id');

        $stories = DB::select("select sections.section_name, sections.id,users.name, stories.image_name, stories.id, stories.title, stories.body, stories.block, stories.id as s_id from users,stories,sections WHERE users.id=stories.user_id and stories.section_id=sections.id and stories.block='0' order by stories.id desc");
        return view('story.stories',['stories'=>$stories]);

    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sections= Section::all();
        return view('story.create_story', ['sections'=>$sections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => 'required',
            'body' => 'required',
            'image' => 'Image|nullable'
        ]);
        
        if($request->hasFile('image')){
            //get file with etension
            $fileNameWithExt= $request->file('image')->getClientOriginalName();
            //get just filename
            $filenaem= pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //file neme to store
            $fileNametoStore= $filenaem.'_'.time().'.'.$extension;
            //store the file
            $path= $request->file('image')->storeAs('public/story_images', $fileNametoStore);

        }
        else{
            $fileNametoStore= 'noimage.jpg';
        }


        $story= new Story;
        $story->title= $request->input('title');
        $story->body= $request->input('body');
        $story->user_id= auth()->user()->id;
        $story->section_id= $request->input('section');
        $story->image_caption= $request->input('image_caption');
        $story->image_name= $fileNametoStore;
        $story->body= $request->input('body');

        $story->save();
        
        $sections= Section::all();
        
        return view('story.create_story')->with(['success'=> 'Story created successfully', 'sections'=>$sections]);
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
       //$story= Story::find($id);
        
        $story= DB::select("select sections.section_name, sections.id, users.id as story_teller, users.name, stories.id, stories.image_name, stories.title, stories.body, stories.block from users,stories,sections WHERE users.id=stories.user_id and stories.section_id=sections.id and stories.id=".$id);
        //return $story;
        
        //$comments= Comment::where('story_id', $id)->get();
        $comments= DB::select("select * from users,stories,comments WHERE comments.user_id=users.id and comments.story_id=stories.id and comments.story_id=".$id);
        
        return view('story.viewstory',['story'=>$story, 'comments'=>$comments]);
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
        $story= Story::find($id);
        $sections= Section::all();
        return view('story.editstory',['story'=>$story, 'sections'=> $sections]);
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
        
        $story= Story::find($id);

        if($request->hasFile('image')){
            //get file with etension
            $fileNameWithExt= $request->file('image')->getClientOriginalName();
            //get just filename
            $filenaem= pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //file neme to store
            $fileNametoStore= $filenaem.'_'.time().'.'.$extension;
            //store the file
            $path= $request->file('image')->storeAs('public/story_images', $fileNametoStore);

        }
        else{
            $fileNametoStore= $story->image_name;
        }


        $story->title= $request->input('title');
        $story->body= $request->input('body');
        $story->section_id= $request->input('section');
        $story->image_caption= $request->input('image_caption');
        $story->image_name= $fileNametoStore;
        $story->body= $request->input('body');

        $story->save();
        
        $story= DB::select("select sections.section_name, sections.id, users.id as story_teller, users.name, stories.id, stories.image_name, stories.title, stories.body, stories.block from users,stories,sections WHERE users.id=stories.user_id and stories.section_id=sections.id and stories.id=".$id);
        //return $story;
        
        //$comments= Comment::where('story_id', $id)->get();
        $comments= DB::select("select * from users,stories,comments WHERE comments.user_id=users.id and comments.story_id=stories.id and comments.story_id=".$id);
  
        return view('story.viewstory',['story'=>$story, 'comments'=>$comments]);
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
        $story= Story::find($id);
        $story->delete();
        $stories = DB::select("select sections.section_name, sections.id,users.name, stories.image_name, stories.id, stories.title, stories.body, stories.block, stories.id as s_id from users,stories,sections WHERE users.id=stories.user_id and stories.section_id=sections.id and stories.block='0' order by stories.id desc");
        return view('story.stories',['stories'=>$stories]);
    }
}
