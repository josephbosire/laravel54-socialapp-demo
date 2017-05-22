@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <p class="text-center">{{$user->name}}'s Profile</p>
        </div>
        <div class="panel-body">
          <center>
            <img src="{{$user->avatar}}" width='70px' height="70px" style="border-radius:50%" alt=""/>
          </center>
          <bg></bg>
          <p class="text-center">{{$user->profile->location}}</p>
          <p class="text-center">
            @if(Auth::id() == $user->id)
            <a href="{{route('profile.edit')}}" class="btn btn-info btn-lg">Edit your Profile</a>
            @endif
          </p>
        </div>
      </div>
      @if(Auth::id() !== $user->id)
      <div class="panel panel-default">
        <div class="panel-body">
          <friend :profile_user_id="{{ $user->id }}"></friend>
        </div>
      </div>
      @endif
      <div class="panel panel-default">
        <div class="panel-heading">
          About me
        </div>
        <div class="panel-body">
          <p class="text-center">{{$user->profile->about}}</p>
        </div>
        <div class="panel-footer">

        </div>
      </div>
  </div>

</div>
@stop
