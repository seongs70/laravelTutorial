<?php

namespace App\Http\Controllers;

use App\Project;
// use App\Services\Twitter;
use App\Events\ProjectCreated;
// use Illuminate\Support\Facades\Mail;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Get all the projects for the authenicated user;

        $projects = auth()->user()->projects;

        // $projects = Project::where('owner_id', auth()->id())->get(); // select * from projects where owner_id = 4

    
        return view('projects.index', [
            'projects' => auth()->user()->projects
        ]);
    }
    public function create()
    {
        return view('projects.create');
    }
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
    public function edit(Project $project)
    {

        return view('projects.edit', compact('project'));
    }
    public function update(Project $project)
    {
       $project->update($this->validateProject());

        $project->update(request(['title', 'description']));

        return redirect('/projects');
    }
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
    public function store()
    {

        $attributes = $this->validateProject();

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        // event(new ProjectCreated($project));

        return redirect('/projects');
    }

    protected function validateProject()
    {
        return request()->validate([
            'title'=> ['required', 'min:3'],
            'description' => ['required', 'min:3']

        ]);

    }
}
