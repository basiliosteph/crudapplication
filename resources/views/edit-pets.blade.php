@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1> Edit Pet Record </h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/save-edit-pets" method="POST">
            <input type="hidden" name="id" value="{{ $pet->getId() }}" />
            @csrf
            <div class ="form-group">
                <label> Pet Name </label>
                <input type="text" class="form-control" name="pet_name" value="{{ $pet->getPetName() }}" required>
            </div>
            <div class ="form-group">
                <label> Animal Type </label>
                <input type="text" class="form-control" name="animal_type" value="{{ $pet->getAnimalType() }}" required>
            </div>
            <div class ="form-group">
                <label> Pet Owner </label>
                <input type="text" class="form-control" name="pet_owner" value="{{ $pet->getPetOwner() }}" required>
            </div>
            <div class ="form-group">
                <label> Owner Address </label>
                <textarea class="form-control" name="address" required>{{ $pet->getAddress() }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary"> Save Changes </button>
          </form>
        </div>
    </div>
</div>
@endsection
