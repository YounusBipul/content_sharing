@extends('layouts.com')
@section('page_title')
    Story 
@endsection
@section('content')

<div class="well">
    @if(Auth::user())
    @if (Auth::user()->id == $story[0]->story_teller)
    <div class="row">
        <div class="col-md-6">
                <a href="/stories/{{$story[0]->id}}/edit">
                    <button class="btn btn-primary"> Edit</button>
                </a>

        </div>
        <div class="col-md-6">
                <form method="POST" action="/stories/{{$story[0]->id}}">
                    @csrf
                    @method("DELETE")
                    <button type='submit' class="btn bg-danger dark"> Delete</button>
                </form>

        </div>
    </div>
    
    @endif
    @endif


   
    @if ($story[0]->block =='1')
    <div class="alert alert-danger">
       <h2>Blocked/Unlisted By Admin</h2> 
    </div>    
    @endif   
    <!--<div class="row">
        <div class="col-md-4">-->
            <h3>Posted by: {{$story[0]->name}}</h3>
            <img class= "img-fluid" src="/storage/story_images/{{$story[0]->image_name}}" alt="">
        <!--</div>
        <div class="col-md-8">-->
                
                <h3>{{$story[0]->title}} <span>({{$story[0]->section_name}})</span> </h3>
                <p>{{$story[0]->body}}</p>
                <!-- Story image -->
                <img src=''>
                <hr>
        <!--</div>
    </div>-->
    <br>
    @if (!Auth::guest())
    @if(count($comments)>0)
    @foreach ($comments as $comment)
        <div class="well">
            {{$comment->name}}
            <p>{{$comment->comment}}</p>
            @if(Auth::user()->id=='1')
            <form method="POST" action="/comments/{{$comment->id}}">
                    @csrf
                    @method("DELETE")
                    <button type='submit' class="btn bg-danger dark"> Delete</button>
                </form>
            @endif
        </div>
    @endforeach
@else
    <div class="well">
       <h4>Be the First one to comment !!</h4> 
    </div>
@endif


    
    <form method="POST" action='/comments'>
        @csrf
        
    <div class="form-group row">
        <?php $s= $story[0]->id ?>
            <input type="hidden" value="{{$s}}" name="story_id">
            <div class="col-md-10">
                <input id="comment" type="text" class="form-control" name="comment"  >
            </div>
            <button type="submit" class="btn btn-primary col-md-2">
                    {{ __('Comment') }}
            </button>
    </div>
    </form>
@endif
 
    
    <?php
     $story_id= $story[0]->id;
     ?>   
     @if (Auth::user())
    @if(Auth::user()->id=='1')
    <form method="POST" action='/block/{{$story_id}}'>
        @csrf
     
    <div class="form-group row">
            <input type="hidden" value="{{$story_id}}" name="story_id">
            
            <button type="submit" class="btn col-md-12 bg-danger dark">
                    {{ __('Block') }}
            </button>
    </div>
    </form>
        
    @endif
    @endif
</div>
@endsection