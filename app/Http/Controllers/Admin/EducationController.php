<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationStoreRequest;
use App\Http\Requests\EducationUpdateRequest;
use App\Libraries\FormFields;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::latest('start_date')->paginate(10);

        return view('admin.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Education $education)
    {
        $formFields = new FormFields($education);
        $formFields = $formFields->generateForm();

        $data = [
            'education' => $formFields,
        ];

        return view('admin.education.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationStoreRequest $request)
    {
        $attributes = array_merge(
            $request->all(), [
                'user_id' => auth()->id(),
            ]);

        if (Education::create($attributes)) {
            return redirect()
                ->route('admin.education.index')
                ->with('status', "New Education '{$request->title}' has been created successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    // public function show(Education $education)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        $formFields = new FormFields($education);
        $formFields = $formFields->generateForm();

        $data = [
            'education' => $formFields,
        ];

        return view('admin.education.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(EducationUpdateRequest $request, Education $education)
    {
        if ($education->update($request->all())) {
            return redirect()
                ->route('admin.education.index')
                ->with('status', "Education '{$request->title}' has been updated successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $title = $education->title;

        if ($education->delete()) {
            return redirect()
                ->route('admin.education.index')
                ->with('status', "Education '{$title}' has been deleted successfully!");
        }

        return back()
            ->withInput();
    }
}
