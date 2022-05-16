@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1> Add a New Pet </h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/save-new-pet" method="POST">
            @csrf
            <div class ="form-group">
                <label> Pet Name </label>
                <input type="text" class="form-control" name="pet_name" required>
            </div>
            <div class ="form-group">
                <label> Animal Type </label>
                <input type="text" class="form-control" name="animal_type" required>
            </div>
            <div class ="form-group">
                <label> Pet Owner </label>
                <input type="text" class="form-control" name="pet_owner" required>
            </div>
            <div class ="form-group">
                <label> Owner Address </label>
                <textarea class="form-control" name="address" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary"> Save Changes </button>
          </form>
        </div>
    </div>
</div>
@endsection
