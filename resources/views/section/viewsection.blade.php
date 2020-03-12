@extends('layouts.com')
@section('page_title')
    Sections 
@endsection
@section('content')

<div class="well">
<h3>Sections: </h3>
    <form method="POST" action='/sections'>
        @csrf
        
    <div class="form-group row">
            <div class="col-md-10">
                <input id="section_name" type="text" class="form-control" name="section_name"  >
            </div>
            <button type="submit" class="btn btn-primary col-md-2">
                    {{ __('Add') }}
            </button>
    </div>
    </form>
    <table class="table" >
        <tr class="row">
            <th>Id</th> <th>Name</th>
        </tr>
        @foreach ($sections as $section)
            <tr class="row">
            <td>{{$section->id}}</td> <td>{{$section->section_name}}</td>
            </tr>
            
        @endforeach
    </table>
    
</div>
@endsection