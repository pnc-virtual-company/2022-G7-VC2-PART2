<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->profile = $request->profile;
        $user->cover = $request->cover;
        $user->save();
        return response()->json(["message" => 'User create successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::FindOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->save();
        return response()->json(["message" => 'User generalinfo update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(["message" => 'delete successfully']);
    }
    /** 
     *  Upadate profile,cover user with user id and stroe profile,cover image as a url
     *  @param int $id
     *  @return \Illuminate\Http\Response
     */
    public function updateUserimage(Request $request,$id){
        $user = User::find($id);
        $path = public_path('images');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        if ($request->profile!=null){
            $file = $request->file('profile');
            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());     
            $file->move($path, $fileName);
            $user->profile = asset('/images/'.$fileName);
            $user->save();
            return response()->json(['message'=>"User profile is updated successfully"]);
        }else if($request->cover!=null) {
            $file = $request->file('cover');
            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());     
            $file->move($path, $fileName);
            $user->cover = asset('/images/'.$fileName);
            $user->save();
            return response()->json(['message'=>"User cover is updated successfully"]);
        }else {
            if ($request->profile==null){
                return response()->json(['message'=>"User Profile image provided null"]);
            }else {
                return response()->json(['message'=>"User Cover image provide null"]);
            }
        }
    }

}
