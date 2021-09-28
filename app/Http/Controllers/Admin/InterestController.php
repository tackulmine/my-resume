<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InterestStoreRequest;
use App\Http\Requests\InterestUpdateRequest;
use App\Libraries\FormFields;
use App\Models\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interests = Interest::orderBy('title')->paginate(10);

        return view('admin.interest.index', compact('interests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Interest $interest)
    {
        $formFields = new FormFields($interest);
        $formFields = $formFields->generateForm();

        $data = [
            'interest' => $formFields,
        ];

        return view('admin.interest.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterestStoreRequest $request)
    {
        $attributes = array_merge(
            $request->all(), [
                'user_id' => auth()->id(),
            ]);

        if (Interest::create($attributes)) {
            return redirect()
                ->route('admin.interest.index')
                ->with('status', "New Interest '{$request->title}' has been created successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    // public function show(Interest $interest)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function edit(Interest $interest)
    {
        $formFields = new FormFields($interest);
        $formFields = $formFields->generateForm();

        $data = [
            'interest' => $formFields,
        ];

        return view('admin.interest.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function update(InterestUpdateRequest $request, Interest $interest)
    {
        if ($interest->update($request->all())) {
            return redirect()
                ->route('admin.interest.index')
                ->with('status', "Interest '{$request->title}' has been updated successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interest $interest)
    {
        $title = $interest->title;

        if ($interest->delete()) {
            return redirect()
                ->route('admin.interest.index')
                ->with('status', "Interest '{$title}' has been deleted successfully!");
        }

        return back()
            ->withInput();
    }
}
