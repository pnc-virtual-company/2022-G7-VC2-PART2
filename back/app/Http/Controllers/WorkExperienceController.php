<?php

namespace App\Http\Controllers;

use App\Models\workExperience;
use Illuminate\Http\Request;

class workExperienceController extends Controller
{
    
    public function index()
    {
        // return workExperience::all();
        return workExperience::with('Company')->orderBy('id','desc')->get();
    }
    // ===========show specified data=============
    public function show($id)
    {
        return workExperience::with('Company')->FindOrFail($id);
    }
    // =========== store your data=============
    public function store(Request $request)
    {
        $workExperience = new workExperience();
        $workExperience->start_year = $request->startYear;
        $workExperience->end_year = $request->endYear;
        $workExperience->company_id = $request->companyId;
        $workExperience->user_id = $request->alumniId;
        $workExperience->position = $request->position;
        $workExperience->current = $request->current;
        $workExperience->save();
        return response()->json(['message'=>'Work expereience create successfully']);
    }
    // ===========update your data=============
    public function update(Request $request, $id)
    {
        $workExperience = workExperience::FindOrFail($id);
        $workExperience->start_year = $request->startYear;
        if ($request->current==0){
        $workExperience->end_year = $request->endYear;
        }
        $workExperience->position = $request->position;
        $workExperience->current = $request->current;
        $workExperience->save();
        return response()->json(['message'=>'Successfully for UpdateData']);
    }

    public function getWorkByAlumin($id)
    {
        return workExperience::where('user_id', '=', $id)->with('Company')->orderBy('id','desc')->get();
    }
    // ========= Delete workExperience data =========================
    public function destroy($id)
    {
        workExperience::destroy($id);
        return response()->json(["message" => 'delete successfully']);
    }
}

