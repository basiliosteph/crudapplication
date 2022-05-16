@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif

        <div>
            <a class="btn btn-primary" href="/add-new-pet-form">
                Add New Pet
            </a>
        </div>

            <table class="table table-striped">
                <tr>
                    <th> ID </th>
                    <th> Pet Name </th>
                    <th> Animal Type </th>
                    <th> Pet Owner </th>
                    <th> Owner Address </th>
                </tr>
                @foreach ($pets as $pet)
                <tr>
                    <th> {{ $pet->id }} </th>
                    <th> {{ $pet->pet_name }} </th>
                    <th> {{ $pet->animal_type }} </th>
                    <th> {{ $pet->pet_owner }} </th>
                    <th> {{ $pet->address }} </th>
                    <th>
                        <a href="/edit-pets/{{ $pet->getId() }}" class="btn btn-primary btn-sm">
                            Edit
                        </a>
                        <a onclick="return confirmDelete()" href="/delete-pets/{{ $pet->getId() }}" class="btn btn-danger btn-sm">
                            Delete
                        </a>
                   </th>
                </tr>
                @endforeach
           </table>
        </div>
    </div>
</div>

<script>

function confirmDelete() {
    var answer = confirm('Are you sure you want to delete this record? This is not reversible.');
    if (answer == true) {
        return true;
    }
    return false;
}

</script>
@endsection
