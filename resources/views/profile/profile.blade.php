@extends('layouts.com')
@section('page_title')
    Profile of {{$user->name}}
@endsection
@section('content')

 <div class="well">
        <!--<div class="profile_img">	
                <span class="prfil-img"> <img src="/storage/user_images/unknown.jpg" alt=""> </span>
        </div>-->
     <h3>User Name: {{$user->name}}</h3>
     <h5>Email : {{$user->email}}</h5>
     <h5>Fate of Brith : {{$user->date_of_birth}}</h5>
     <h5>Contact : {{$user->phone}}</h5>
     @if ($user->gender=='1')
     <h5>Gender : Male</h5> 
     @else 
     <h5>Gender : Female</h5>
     @endif
    
     
 <a href="/editprofile/{{$user->id}}"><button type="submit" class="btn btn-hover btn-dark btn-block col-24">Edit My Profile</button></a>
     
 </div>
@endsection