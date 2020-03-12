@extends('layouts.com')
@section('page_title')
    Stories
@endsection
@section('content')
@if(count($stories)>0)
@foreach ($stories as $story)
    <a href="/stories/{{$story->s_id}}">
    <div class="well">
        
        <div class="row">
            <div class="col-md-4 col-sm-4">
            <img class= "img-fluid" src="/storage/story_images/{{$story->image_name}}" alt="">
            </div>
            <div class="com-md-8 col-sm-8" >
                <!-- Story Teller -->
                <h5>{{$story->name}} </h5>
                <!-- Story Title -->
                @if ($story->block =='1')
                <div class="alert alert-danger">
                <h2>Blocked/Unlisted By Admin</h2> 
                </div>    
                @endif  
                <h4 class="mt-4">{{$story->title}} <span>({{$story->section_name}})</span></h4>

                    <!-- Story body -->
                    <p>{{$story->body}}</p>
                    
            </div>
        </div>
    
    </a>
    <br> 
    @if (!Auth::guest())
    <form method="POST" action='/comments'>
        @csrf
        
    <div class="form-group row">
            <input type="hidden" value="{{$story->id}}" name="story_id">
            <div class="col-md-10">
                <input id="comment" type="text" class="form-control" name="comment"  >
            </div>
            <button type="submit" class="btn btn-primary col-md-2">
                    {{ __('Comment') }}
            </button>
    </div>
    </form>    
    @endif

    
    @if (Auth::user())
    @if(Auth::user()->id=='1')
    <form method="POST" action='/block/{{$story->id}}'>
        @csrf
        
    <div class="form-group row">
            <input type="hidden" value="{{$story->id}}" name="story_id">
            
            <button type="submit" class="btn col-md-12 bg-danger dark">
                    {{ __('Block') }}
            </button>
    </div>
    </form>
        
    @endif
    @endif
   
   
                
    </div>
    
    
@endforeach

@else 
    <div>
        <h1>No stories available</h1>        
    </div>    

@endif
<!--<h3 id="forms-horizontal">My Requests</h3>
<table class="table table-hover">
    <tr >
        <th>Date</th> <th> Name</th> <th>Reason</th> <th>days</th> <th>From</th> <th>To</th> <th>Status</th>
    </tr>
    <tbody id='table_body'>
        
    </tbody>

</table>-->
        
@endsection
