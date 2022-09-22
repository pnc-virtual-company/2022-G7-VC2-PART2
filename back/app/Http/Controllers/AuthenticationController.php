<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\SendMailController;
use Illuminate\Support\Facades\Crypt;


class AuthenticationController extends Controller
{
    /**
     * Alumni will be able to login by their email and password
     * @return token
     */
    public function alumniLogin(Request $request){
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password,$user->password)) {
            if (!$user){
                return response()->json(['message'=>"Couldn't find your account the system", 'email'=> true],401);
            }else {
                return response()->json(['message' => 'Password provided is not correct', 'password'=> true], 401);
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

    public function inviteEro(Request $request){
        (new SendMailController)->sendMailRegisterInfo($request);
        $user = new User();
        $user->role = 'ero';
        $user->email = $request->email;
        $user->save();
    }

    public function eroRegister(Request $request){
        $email = Crypt::decryptString($request->email);
        $request -> validate([
            'first_name'=>'required|string|',
            'last_name'=>'required|string|',
            'password'=>'required|string|min:8',
        ]);
        $user = User::where('email', $email)->first();
        $password = $user->password;
        if(!empty($user) && empty($password)){
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->password = Hash::make($request->password);
            $user->save();
        }
        return response()->json(empty($user) && empty($password));
    }

    public function checkBeforeRegister(Request $request){
        $email = Crypt::decryptString($request->email);
        $user = User::where('email', $email)->first();
        $password = $user->password;
        if(!empty($user) && empty($password)){
            return response()->json(['status'=> true]);
        }
        return response()->json(['status'=> false]);
    }

    // Get information by token
    public function getInfoByToken(){
        $info = auth('sanctum')->user();
        return Response()->json(['data'=>$info]);
    }
}
