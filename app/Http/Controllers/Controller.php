<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkLogin(Request $request){
        $uname = $request->uname;
        $pass = $request->pass;
        $user = User::select('*')->where([['uname', '=', $uname],['password', '=', $pass]])->first();
        if($user){
            return 'success';
        }else{
            return 'error';
        }
    }
}
