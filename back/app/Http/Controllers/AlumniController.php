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
        // return Alumni::get();
        return Alumni::with('User','Batch','Major')->get();
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
        return response()->json(['status_success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $alumni_id = Alumni::;
        return Alumni::with('User','Batch','Major')->where('user_id','=', $id)->first();

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
        return Alumni::with('User','Batch','Major')->where('user_id','=', $id)->first();
    }

    public function updateBatch(Request $request,$id)
    {
        $alumni = Alumni::where('user_id','=', $id)->first();
        // $alumni->user_id = $request->user_id;
        $request -> validate([
            'batch_id' => 'required|numeric|'
        ]);
        $alumni->batch_id = $request->batch_id;
        // $alumni->major_id = $request->major_id;
        
        $alumni->save();
        return response()->json($alumni);
    }

}
