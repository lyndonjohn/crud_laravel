<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255|unique:projects',
                'description' => 'max:255'
            ]
        );

        Project::create(
            [
                'name' => $validated['name'],
                'description' => $validated['description'],
            ]
        );

        return redirect()->route('projects.index')->with('message', 'Project added!');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255|unique:projects,name,' . $project->id,
                'description' => 'max:255'
            ]
        );

        $project->update(
            [
                'name' => $validated['name'],
                'description' => $validated['description'],
            ]
        );

        return back()->with('message', 'Project updated!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('message', 'Project deleted!');
    }
}
