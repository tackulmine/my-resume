<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageStoreRequest;
use App\Http\Requests\LanguageUpdateRequest;
use App\Libraries\FormFields;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::orderBy('title')->paginate(10);

        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Language $language)
    {
        $formFields = new FormFields($language);
        $formFields = $formFields->generateForm();

        $data = [
            'language' => $formFields,
        ];

        return view('admin.language.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageStoreRequest $request)
    {
        $attributes = array_merge(
            $request->all(), [
                'user_id' => auth()->id(),
            ]);

        if (Language::create($attributes)) {
            return redirect()
                ->route('admin.language.index')
                ->with('status', "New Language '{$request->title}' has been created successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    // public function show(Language $language)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        $formFields = new FormFields($language);
        $formFields = $formFields->generateForm();

        $data = [
            'language' => $formFields,
        ];

        return view('admin.language.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageUpdateRequest $request, Language $language)
    {
        if ($language->update($request->all())) {
            return redirect()
                ->route('admin.language.index')
                ->with('status', "Language '{$request->title}' has been updated successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $title = $language->title;

        if ($language->delete()) {
            return redirect()
                ->route('admin.language.index')
                ->with('status', "Language '{$title}' has been deleted successfully!");
        }

        return back()
            ->withInput();
    }
}
