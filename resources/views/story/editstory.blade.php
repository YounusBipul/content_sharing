@extends('layouts.com')
@section('page_title')
    Edit Story
@endsection
@section('content')
@if (!Auth::guest())
<div class="well">

<form method="POST" action="/stories/{{$story->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="form-group">
        <label for="title" class="control-label">Story Title:</label>
    <input type="text" class="form-control" id="title" name='title' value="{{$story->title}}" >
    </div>
    <div class="form-group">
            <label for="section" class="control-label">Section</label>
            <select class="form-control" name='section'>
                @foreach ($sections as $section)
                    @if ($section->id== $story->section_id)
                    <option value="{{$section->id}}" selected>{{$section->section_name}}</option>
                    @else
                    <option value="{{$section->id}}">{{$section->section_name}}</option>
                    @endif    
                    
                @endforeach
                
            </select>
        </div>
    <div class="form-group">
        <label for="body" class="control-label">Story Body:</label>
        <textarea class="form-control" id="story_body" name='body'>{{$story->body}}</textarea>
    </div>
    <div class="form-group">
        <label for="image_caption" class="control-label">Image Caption:</label>
        <input type="text" class="form-control" id="image_caption" name='image_caption' value="{{$story->image_caption}}" >
    </div>
    <div class="form-group">
        <label for="image" class="control-label">Image:</label>
        <input type="file" class="" id="image" name='image' >
    </div>
    <button type="submit" class="btn btn-hover btn-dark btn-block col-24">Update Story</button>
    </form>


</div>
@endif
@endsection