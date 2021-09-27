<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceStoreRequest;
use App\Http\Requests\ExperienceUpdateRequest;
use App\Libraries\FormFields;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = WorkExperience::latest('start_date')->paginate(10);

        return view('admin.experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WorkExperience $experience)
    {
        $formFields = new FormFields($experience);
        $formFields = $formFields->generateForm();

        // additional formFields
        $formFields->tags = [];

        // generate tag options
        $tagOptions = [];
        foreach ($experience->allTagModels() as $tag) {
            $tagOptions[$tag->name] = $tag->name;
        }

        $data = [
            'experience' => $formFields,
            'tagOptions' => $tagOptions,
        ];

        return view('admin.experience.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceStoreRequest $request)
    {
        $attributes = array_merge(
            $request->all(), [
                'user_id' => auth()->id(),
            ]);

        if ($workExperience = WorkExperience::create($attributes)) {
            $workExperience->tag($request->tags);

            return redirect()
                ->route('admin.experience.index')
                ->with('status', "New Experience '{$request->title}' has been created successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    // public function show(WorkExperience $experience)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkExperience $experience)
    {
        $formFields = new FormFields($experience);
        $formFields = $formFields->generateForm();

        // additional formFields
        $formFields->tags = $experience->tags->pluck('name');

        // generate tag options
        $tagOptions = [];
        foreach ($experience->allTagModels() as $tag) {
            $tagOptions[$tag->name] = $tag->name;
        }

        $data = [
            'experience' => $formFields,
            'tagOptions' => $tagOptions,
        ];

        return view('admin.experience.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienceUpdateRequest $request, WorkExperience $experience)
    {
        if ($experience->update($request->all())) {
            $experience->retag($request->tags);

            return redirect()
                ->route('admin.experience.index')
                ->with('status', "Experience '{$request->title}' has been updated successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkExperience $experience)
    {
        $title = $experience->title;

        if ($experience->delete()) {
            return redirect()
                ->route('admin.experience.index')
                ->with('status', "Experience '{$title}' has been deleted successfully!");
        }

        return back()
            ->withInput();
    }
}
