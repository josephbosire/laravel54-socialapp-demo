@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Your Profile</div>

                <div class="panel-body">
                    <form enctype="multipart/form-data" action="{{route('profile.update')}}" method="post">
                      {{csrf_field()}}

                      <div class="form-group">
                        <label for="avatar">Upload avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" placeholder="" accept="image/">
                      </div>
                      <div class="form-group">
                        <label for="location">Location</label>
                        <input required type="text" value="{{$info->location}}" class="form-control" id="location" name="location" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="about">About me</label>
                        <textarea required name="about" rows="10" cols="30" class="form-control">{{$info->about}}</textarea>
                      </div>
                      <div class="form-group">
                        <p class="text-center">
                            <button type="submit" class="btn btn-primary">
                                Save your information
                            </button>
                        </p>
                      </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
