<!-- resources/views/team_members/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Team Members</h1>
        <a href="{{ route('team-members.create') }}" class="btn btn-primary">Add Team Member</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teamMembers as $teamMember)
                    <tr>
                        <td>{{ $teamMember->name }}</td>
                        <td>{{ $teamMember->email }}</td>
                        <td>
                            <a href="{{ route('team-members.edit', $teamMember->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('team-members.destroy', $teamMember->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection