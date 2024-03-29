<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\SkillType;
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
        $skillTypeTable = (new SkillType)->getTable();
        $skillTable = (new Skill)->getTable();

        $cacheKey = "home";
        $cacheTtl = 300;
        $user = cache()->remember(
            $cacheKey,
            $cacheTtl,
            function () use ($userId, $skillTypeTable, $skillTable) {
                $user = User::find($userId);
                $user->load([
                    'education' => function ($q) {
                        $q->orderByDesc('start_date');
                    },
                    'interests' => function ($q) {
                        $q->orderBy('title');
                    },
                    'languages' => function ($q) {
                        $q->orderBy('title');
                    },
                    'projects' => function ($q) {
                        $q->orderByDesc('start_date')
                            ->orderByDesc('created_at');
                    },
                    'projects.projectType',
                    'skills' => function($q) use (
                        $skillTypeTable,
                        $skillTable
                    ) {
                        $q->select("{$skillTable}.*")
                            ->join($skillTypeTable, $skillTypeTable.'.id',  '=', $skillTable.'.skill_type_id')
                            ->orderBy($skillTypeTable.'.order_no')
                            ->orderBy($skillTypeTable.'.title')
                            ->orderBy($skillTable.'.order_no')
                            ->orderBy($skillTable.'.title')
                            ->orderByDesc($skillTable.'.created_at');
                    },
                    'skills.skillType',
                    'socialMedia' => function ($q) {
                        $q->orderBy('order_no')
                            ->orderBy('title');
                    },
                    'userProfile',
                    'workExperiences' => function ($q) {
                        $q->orderByDesc('start_date');
                    },
                    'workExperiences.tags',
                ]);

                return $user;
            }
        );

        return view('home', compact('user'));
    }
}
