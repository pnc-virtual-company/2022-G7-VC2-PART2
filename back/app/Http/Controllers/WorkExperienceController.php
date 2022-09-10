<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    
    public function index()
    {
        // return WorkExperience::all();
        return WorkExperience::with('Company')->get();
    }
    // ===========show specified data=============
    public function show($id)
    {
        return WorkExperience::with('Company')->FindOrFail($id);
    }
    // =========== store your data=============
    public function store(Request $request)
    {
        $workExperience = new WorkExperience();
        $workExperience->start_year = $request->start_year;
        $workExperience->end_year = $request->end_year;
        $workExperience->company_id = $request->company_id;
        // $workExperience->alumni_id = $request->alumni_id;
        $workExperience->position_id = $request->position_id;
        $workExperience->save();
        return response()->json(['message'=>'Successfull for StoreData']);
    }
    // ===========update your data=============
    public function update(Request $request, $id)
    {
        $workExperience = WorkExperience::FindOrFail($id);
        $workExperience->start_year = $request->start_year;
        $workExperience->end_year = $request->end_year;
        $workExperience->save();
        return response()->json(['message'=>'Successfull for UpdateData']);
    }

}