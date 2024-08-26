@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <h1>Create New Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="doing">Doing</option>
                <option value="done">Done</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="time_spent" class="form-label">Time Spent (minutes)</label>
            <input type="number" class="form-control" id="time_spent" name="time_spent" required>
        </div>
        <div class="mb-3">
            <label for="team_member_id" class="form-label">Team Member</label>
            <select class="form-control" id="team_member_id" name="team_member_id" required>
                @foreach($teamMembers as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="problems_faced" class="form-label">Problems Faced</label>
            <textarea class="form-control" id="problems_faced" name="problems_faced" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="blockers" class="form-label">Blockers</label>
            <textarea class="form-control" id="blockers" name="blockers" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
@endsection