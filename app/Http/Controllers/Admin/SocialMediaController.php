<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMediaStoreRequest;
use App\Http\Requests\SocialMediaUpdateRequest;
use App\Libraries\FormFields;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialMedias = SocialMedia::orderBy('order_no')
            ->orderBy('title')
            ->paginate(10);

        return view('admin.social-media.index', compact('socialMedias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SocialMedia $socialMedia)
    {
        $formFields = new FormFields($socialMedia);
        $formFields = $formFields->generateForm();

        $data = [
            'socialMedia' => $formFields,
        ];

        return view('admin.social-media.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialMediaStoreRequest $request)
    {
        $attributes = array_merge(
            $request->all(), [
                'user_id' => auth()->id(),
            ]);

        if (SocialMedia::create($attributes)) {
            return redirect()
                ->route('admin.social-media.index')
                ->with('status', "New Social Media '{$request->title}' has been created successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    // public function show(SocialMedia $socialMedia)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $socialMedia)
    {
        $formFields = new FormFields($socialMedia);
        $formFields = $formFields->generateForm();

        $data = [
            'socialMedia' => $formFields,
        ];

        return view('admin.social-media.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function update(SocialMediaUpdateRequest $request, SocialMedia $socialMedia)
    {
        if ($socialMedia->update($request->all())) {
            return redirect()
                ->route('admin.social-media.index')
                ->with('status', "Social Media '{$request->title}' has been updated successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $socialMedia)
    {
        $title = $socialMedia->title;

        if ($socialMedia->delete()) {
            return redirect()
                ->route('admin.social-media.index')
                ->with('status', "Social Media '{$title}' has been deleted successfully!");
        }

        return back()
            ->withInput();
    }
}
