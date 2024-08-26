<!-- resources/views/team_members/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Team Member</h1>
        <form action="{{ route('team-members.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="position">Phone</label>
                <input type="text" class="form-control" id="position" name="position" required>
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="position" class="form-control" id="position" name="position" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection