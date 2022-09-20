<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyCode;
use Illuminate\Support\Facades\Hash;

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

    /** Generate code and send mail who forget password 
     *  @return \Illuminate\Http\Response
    */
    public function sendVerifyCode(Request $request)
    {   
        $email = $request->email;
        $verify_code = Str::random(8);
        $user = User::where('email', $email)->first();
        $user->verify_code = $verify_code;
        $user->save();
        $data = [
            'title' => 'Verify code to reset password',
            'body' => $verify_code,
        ];
        Mail::to($email)->send(new VerifyCode($data));

        return $user;
    }
    public function getVerifyCode(Request $request){
        $user = User::where('verify_code', '=', $request->verify_code)->first();
        if($user->id){
            return response()->json(['status'=>true]);
        }
    }
    public function resetNewPassword(Request $request){
        $user = User::where('email','=',$request->email)->first();
        $user = User::where('verify_code','=', $request->verify_code)->first();
        if($user){
            $user->password =  Hash::make($request->new_password);
            $user->save();
            return $user;
        }
        return response()->json(['message'=>'must put the verify code','status'=>false,]);
    }
}
