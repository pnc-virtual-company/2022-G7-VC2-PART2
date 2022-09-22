<?php

namespace App\Http\Controllers;

use App\Models\Skill;
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
        return Skill::with('alumni')->get();

    }
    public function getSkillbyAlumin($id)
    {
        return Skill::where('alumni_id', '=', $id)->with('alumni')->orderBy('id','desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $skill = new Skill();
        $skill->name = $request->name;
        $skill->type = $request->type;
        $skill->alumni_id = $request->alumni_id;

        $skill->save();
        return response()->json(["message" => 'Create Skill Successfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Skill::destroy($id);
    }
}
