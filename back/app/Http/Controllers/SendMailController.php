<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Mail\InviteEroMail;
use App\Mail\sendOTPMail;



class SendMailController extends Controller
{
     public function sendMailRegisterInfo($info){
          Mail::to($info->email)->send(new InviteEroMail($info));
     
          if (Mail::flushMacros()) {
               return Response()->json(['fail' => 'Sorry! Please try again latter'], 401);
          }else{
               return response()->json(['success', 'Great! Successfully send in your mail'], 201);
          }
     }

     public function sendOTP($info){
          Mail::to($info->email)->send(new sendOTPMail($info));
     
          if (Mail::flushMacros()) {
               return Response()->json(['fail' => 'Sorry! Please try again latter'], 401);
          }else{
               return response()->json(['success', 'Great! Successfully send in your mail'], 201);
          }
     }
}
