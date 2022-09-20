<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $user->password = Hash::make($request->password);
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
        $user->password = Hash::make($request->password);
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
        return response()->json(["message" => 'Delete user successfully']);
    }
    /**
     * Alumni will be able to login by their email and password
     * @return token
     */
    public function alumniLogin(Request $request){
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password,$user->password)) {
            if (!$user){
                return response()->json(['message'=>"Email provided is not correct!"],401);
            }else {
                return response()->json(['message' => 'Password provided is not correct'], 401);
            }
        }
        $token = $user->createToken('mytoken')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    } 

    public function loggedOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json($request);
    }
}
