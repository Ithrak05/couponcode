<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerifyController extends Controller
{
    //
    public function verify(){
        if(\Auth::user()->otp_verify){
            return redirect()->to(route('user.couponcode.index'));
        }else{
            return view('auth.otp');
        }

    }
    public function otpverify(Request $req){
        $otp=$req->otp;
        if($otp!=\Auth::user()->otp){
            return redirect()->back()->withErrors('Entered otp is Wrong');
        }else{
            $user=User::find(\Auth::user()->id)->update(['otp_verify'=>'1']);
            return redirect()->to(route('user.couponcode.index'));
        }



    }
}
