<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('teamMember')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $teamMembers = TeamMember::all();
        return view('tasks.create', compact('teamMembers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:doing,done',
            'time_spent' => 'required|integer|min:0',
            'problems_faced' => 'nullable',
            'blockers' => 'nullable',
            'team_member_id' => 'required|exists:team_members,id',
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $teamMembers = TeamMember::all();
        return view('tasks.edit', compact('task', 'teamMembers'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:doing,done',
            'time_spent' => 'required|integer|min:0',
            'problems_faced' => 'nullable',
            'blockers' => 'nullable',
            'team_member_id' => 'required|exists:team_members,id',
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}