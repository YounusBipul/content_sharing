@extends('layouts.com')
@section('page_title')
    Edi Profile
@endsection
@section('content')

<div class="well">
   
<form method="POSt" action="/editprofile/{{Auth::user()->id}}">   
    @csrf
    @method('PUT')
    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
    <div class="form-group">
        <label for="name" class="control-label">User Name:</label>
        <input type="text" class="form-control" id="name" name='name' value="{{$user->name}}"">
    </div>
    <div class="form-group">
        <label for="email" class="control-label">Email:</label>
        <input type="email" class="form-control" id="email" name='email' value="{{$user->email}}" >
    </div>
    <div class="form-group">
        <label for="date_of_birth" class="control-label">Fate of Brith:</label>
        <input type="date" class="form-control" id="date_of_birth" name='date_of_birth' value="{{$user->date_of_birth}}">
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Gender</label>
        <div class="form-group">
            @if ($user->gender=='1')
            <input id="gender"  type="radio" name="gender" value="1" checked> Male<br>
            <input id="gender"   type="radio" name="gender" value="0" > Female<br>
            @else
            <input id="gender"  type="radio" name="gender" value="1" > Male<br>
            <input id="gender"   type="radio" name="gender" value="0" checked> Female<br>
                
            @endif
            
        </div>
    </div>
    <div class="form-group">
        <label for="phone" class="control-label">Phone:</label>
        <input type="text" class="form-control" id="phone" name='phone' value="{{$user->phone}}"">
    </div>
    <button type="submit" class="btn btn-hover btn-dark btn-block col-24">Update</button>
</form>
     
 </div>
@endsection