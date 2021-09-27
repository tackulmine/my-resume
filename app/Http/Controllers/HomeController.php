<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = 1;
        $user = User::find($userId);
        $user->load([
            'education' => function ($q) {
                $q->orderByDesc('start_date');
            },
            'interests',
            'languages',
            'projects' => function ($q) {
                $q->orderByDesc('start_date')
                    ->orderByDesc('created_at');
            },
            'projects.projectType',
            'skills',
            'socialMedia',
            'userProfile',
            'workExperiences' => function ($q) {
                $q->orderByDesc('start_date');
            },
            'workExperiences.tags',
        ]);

        return view('home', compact('user'));
    }
}
