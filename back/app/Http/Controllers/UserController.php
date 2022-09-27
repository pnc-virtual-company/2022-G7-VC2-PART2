<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\SendMailController;
use Illuminate\Support\Facades\Crypt;


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
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->role = 'alumni';
        $user->profile = $request->profile;
        $user->cover = $request->cover;
        $user->save();
        return response()->json(["user_id" => $user->id, "status_success" => true]);
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
    public function updateForRequest(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->save();
        return response()->json(["user_id" => $user->id, "status_success" => true]);
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
