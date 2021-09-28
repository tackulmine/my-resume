<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillStoreRequest;
use App\Http\Requests\SkillUpdateRequest;
use App\Libraries\FormFields;
use App\Models\Skill;
use App\Models\SkillType;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skillTypeTable = (new SkillType)->getTable();
        $skillTable = (new Skill)->getTable();
        $skills = Skill::select("{$skillTable}.*")
            ->with('skillType')
            ->join($skillTypeTable, $skillTypeTable.'.id',  '=', $skillTable.'.skill_type_id')
            ->orderBy($skillTypeTable.'.order_no')
            ->orderBy($skillTypeTable.'.title')
            ->orderBy($skillTable.'.order_no')
            ->orderBy($skillTable.'.title')
            ->orderByDesc($skillTable.'.created_at')
            ->paginate(10);

        return view('admin.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Skill $skill)
    {
        $skill->load('skillType');

        $formFields = new FormFields($skill);
        $formFields = $formFields->generateForm();

        $formFields->skillType = $skill->skillType;

        $data = [
            'skill' => $formFields,
            'skillTypeOptions' => SkillType::pluck('title', 'title'),
        ];

        return view('admin.skill.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillStoreRequest $request)
    {
        $attributes = array_merge(
            $request->all(),
            [
                'user_id' => auth()->id(),
            ]
        );

        $skillType = SkillType::firstOrCreate([
            'title' => ucwords($request->skill_type_id),
        ]);

        $attributes = [
            'skill_type_id' => $skillType->id
        ] + $attributes;

        if ($skill = Skill::create($attributes)) {
            return redirect()
                ->route('admin.skill.index')
                ->with('status', "New Skill '{$request->title}' has been created successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    // public function show(Skill $skill)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        $skill->load('skillType');

        $formFields = new FormFields($skill);
        $formFields = $formFields->generateForm();

        $formFields->skillType = $skill->skillType;

        $data = [
            'skill' => $formFields,
            'skillTypeOptions' => SkillType::pluck('title', 'title'),
        ];

        return view('admin.skill.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(SkillUpdateRequest $request, Skill $skill)
    {
        $attributes = $request->all();

        $skillType = SkillType::firstOrCreate([
            'title' => ucwords($request->skill_type_id),
        ]);

        $attributes = [
            'skill_type_id' => $skillType->id
        ] + $attributes;

        if ($skill->update($attributes)) {
            return redirect()
                ->route('admin.skill.index')
                ->with('status', "Skill '{$request->title}' has been updated successfully!");
        }

        return back()
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $title = $skill->title;

        if ($skill->delete()) {
            return redirect()
                ->route('admin.skill.index')
                ->with('status', "Skill '{$title}' has been deleted successfully!");
        }

        return back()
            ->withInput();
    }
}
