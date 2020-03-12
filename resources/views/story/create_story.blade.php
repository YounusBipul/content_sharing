@extends('layouts.com')
@section('page_title')
    Create Story
@endsection
@section('content')
@if (!Auth::guest())
<div class="well">
@if(count($sections)>0)
    <form method="POST" action="/stories" enctype="multipart/form-data">
        @csrf
        
    <div class="form-group">
        <label for="title" class="control-label">Story Title:</label>
        <input type="text" class="form-control" id="title" name='title' >
    </div>
    <div class="form-group">
            <label for="section" class="control-label">Section</label>
            <select class="form-control" name='section'>
                @foreach ($sections as $section)
            <option value="{{$section->id}}">{{$section->section_name}}</option>    
                @endforeach
                
            </select>
        </div>
    <div class="form-group">
        <label for="body" class="control-label">Story Body:</label>
        <textarea class="form-control" id="story_body" name='body'></textarea>
    </div>
    <div class="form-group">
        <label for="image_caption" class="control-label">Image Caption:</label>
        <input type="text" class="form-control" id="image_caption" name='image_caption' >
    </div>
    <div class="form-group">
        <label for="image" class="control-label">Image:</label>
        <input type="file" class="" id="image" name='image' >
    </div>
    <button type="submit" class="btn btn-hover btn-dark btn-block col-24">Post a Story</button>
    </form>

@else
    <h2>Please ask admin to Create Sections First</h2>
@endif
</div>
@else 
 <script>
     window.location.replace("/login");
 </script>
@endif
@endsection