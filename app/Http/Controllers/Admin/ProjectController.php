<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Libraries\FormFields;
use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('projectType')
            ->orderByDesc('project_type_id')
            ->orderByDesc('start_date')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $project->load('projectType');

        $formFields = new FormFields($project);
        $formFields = $formFields->generateForm();

        $formFields->projectType = $project->projectType;

        $data = [
            'project' => $formFields,
            'projectTypeOptions' => ProjectType::pluck('title', 'title'),
        ];

        return view('admin.project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        $attributes = array_merge(
            $request->all(),
            [
                'user_id' => auth()->id(),
            ]
        );

        $projectType = ProjectType::firstOrCreate([
            'title' => ucwords($request->project_type_id),
        ]);

        $attributes = [
            'project_type_id' => $projectType->id
        ] + $attributes;

        if ($project = Project::create($attributes)) {
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->storeAs(
                    'projects',
                    $project->id.'.'.$request->file('photo')->extension(),
                    'shared'
                );

                $project->update([
                    'photo' => $path,
                ]);
            }

            return redirect()
                ->route('admin.project.index')
                ->with('status', "New Project '{$request->title}' has been created successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    // public function show(Project $project)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project->load('projectType');

        $formFields = new FormFields($project);
        $formFields = $formFields->generateForm();

        $formFields->projectType = $project->projectType;

        $data = [
            'project' => $formFields,
            'projectTypeOptions' => ProjectType::pluck('title', 'title'),
        ];

        return view('admin.project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $attributes = $request->all();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->storeAs(
                'projects',
                $project->id.'.'.$request->file('photo')->extension(),
                'shared'
            );

            $attributes = [
                'photo' => $path,
            ] + $attributes;
        }

        $projectType = ProjectType::firstOrCreate([
            'title' => ucwords($request->project_type_id),
        ]);

        $attributes = [
            'project_type_id' => $projectType->id
        ] + $attributes;

        if ($project->update($attributes)) {
            return redirect()
                ->route('admin.project.index')
                ->with('status', "Project '{$request->title}' has been updated successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $title = $project->title;

        if ($project->delete()) {
            return redirect()
                ->route('admin.project.index')
                ->with('status', "Project '{$title}' has been deleted successfully!");
        }

        return back()
            ->withInput();
    }
}
