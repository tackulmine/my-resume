<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Libraries\FormFields;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $user->load('userProfile');

        return view('admin.profile.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        $user->load('userProfile');

        $formFields = new FormFields($user);
        $formFields = $formFields->generateForm();

        $formFields->userProfile = $user->userProfile;

        $data = [
            'user' => $formFields,
        ];

        return view('admin.profile.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $attributes = $request->except(['password', 'password_confirmation']);
        if ($request->filled('password')) {
            $attributes = $request->all();
        }

        if ($user->update($attributes)) {
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->storeAs(
                    'avatars',
                    $request->user()->id.'.'.$request->file('photo')->extension(),
                    'shared'
                );

                $attributes = [
                    'photo' => $path,
                ] + $attributes;
            }

            $userProfile = (new UserProfile)->updateOrCreate(
                ['user_id' => auth()->id()],
                $attributes,
            );

            return redirect()
                ->route('admin.profile.index')
                ->with('status', "My Profile has been updated successfully!");
        }

        return back()
            ->withInput();
    }
}
