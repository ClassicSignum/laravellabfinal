<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;


class loginController extends Controller
{
    public function index(Request $req){

        $loginemail=$req->email;
        $password=$req->password;

        $user=User::where('usermail',$loginemail)
                    ->where('password',$password)
                    ->first();
        if(!empty($user)){
            $req->session()->put('usermail',$loginemail);
            if($user->usertype=="admin"){
                return redirect()->route('admin.index');
            }
            else{
                
                return redirect()->route('customer.index');
            }
        }
        else{
            return redirect('/travelia');
        
        }

    }
}
