<?php

namespace App\Http\Controllers;

use App\Models\school;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return school::with('alumni')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = new school();
        $path = public_path('images');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('school_logo');
        if ($file != null){
            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());  
            $file->move($path, $fileName);
            $school->school_profile = asset('/images/'.$fileName);
        }   
        $school->school_name = $request->school_name;
        $school->start_date = $request->start_date;
        $school->end_date = $request->end_date;
        $school->degree = $request->degree;
        $school->current = $request->current;
        $school->alumni_id = $request->alumni_id;
        $school->save();
        return response()->json(['message'=>"Alumni School have been created!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function show(school $school,$id)
    {
        return school::with('alumni')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $school = school::find($id);
        $path = public_path('images');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('school_logo');
        if ($file != null){
            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());  
            $file->move($path, $fileName);
            $school->school_profile = asset('/images/'.$fileName);
        }  
        if ($request->current==0){
            $school->end_date = $request->end_date;
        }else {
            $school->current = $request->current;
        }
        $school->school_name = $request->school_name;
        $school->start_date = $request->start_date;
        $school->degree = $request->degree;
        $school->save();
        return response()->json(['message'=>"Alumni School have been updated!"]);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        school::destroy($id);
        return response()->json(['message'=>"Alumni school have been deleted!!"]);
    }
}
