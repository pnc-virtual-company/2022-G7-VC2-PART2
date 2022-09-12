<?php

namespace App\Http\Controllers;

use App\Models\workExperience;
use Illuminate\Http\Request;

class workExperienceController extends Controller
{
    
    public function index()
    {
        // return workExperience::all();
        return workExperience::with('Company','Position')->get();
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
        // $workExperience->alumni_id = $request->alumni_id;
        $workExperience->position_id = $request->positionId;
        $workExperience->save();
        return response()->json(['message'=>'Successfully for CreateData']);
    }
    // ===========update your data=============
    public function update(Request $request, $id)
    {
        $workExperience = workExperience::FindOrFail($id);
        $workExperience->start_year = $request->startYear;
        $workExperience->end_year = $request->endYear;
        $workExperience->save();
        return response()->json(['message'=>'Successfully for UpdateData']);
    }
}