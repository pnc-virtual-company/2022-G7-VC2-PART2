<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
   
    public function index()
    {
        return Position::all();
    }
    
    public function store(Request $request)
    {
        $position = new Position();
        $position->name = $request->name;
        $position->save();
        return response()->json(['message' => 'Successfull for Createdata']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Position::FindOrFail($id);
    }

}