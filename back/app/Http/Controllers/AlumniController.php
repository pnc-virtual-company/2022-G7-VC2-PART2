<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Alumni::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumni = new Alumni();
        $alumni->user_id = $request->user_id;
        $alumni->batch_id = $request->batch_id;
        $alumni->major_id = $request->major_id;
        
        $alumni->save();
        return response()->json(['message'=>'Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Alumni::with('User','Batch','Major','schools')->find($id);
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->user_id = $request->user_id;
        $alumni->batch_id = $request->batch_id;
        $alumni->major_id = $request->major_id;
        
        $alumni->save();
        return response()->json(['message'=>'updated']);
    }

    public function getAlumniByUser($id)
    {
        // GET alumni_id only by user id
        $alumni_id = Alumni::where('user_id', $id)->select('id')->first();
        return Alumni::with('User','Batch','Major')->FindOrFail($alumni_id);
        // return Alumni::where('user_id', $id)->first()->with('Batch');
        // return Alumni::where('user_id', $id)->with('user_id','Batch','Major')->first();
        // return Alumni::with('user_id','Batch','Major')->whereIn('user_id', $id)->first();
        // return response()->json(['message'=>'updated']);
    }

}
