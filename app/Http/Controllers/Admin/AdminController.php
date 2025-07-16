<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check(Request $request){

        $title = "User Dashboard";
        $request->validate([
        'email'=>'required|email|exists:admins,email',
        'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in admins table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('admin')->attempt($creds) ){

         return redirect()->route('vrtvrtregrtrtbteyb.home');

        }else{
            return redirect()->route('vrtvrtregrtrtbteyb.login')->with(['fail','Incorrect credentials','title'=>$title]);
        }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/vrtvrtregrtrtbteyb');
    }

    public function dashboard(Request $request)
    {
        $content = 'admin/dashboard/index'; 
        $title = "User Dashboard";
        $user = User::all();
        $card = Card::all();
        return view('admin/master')->with(['content'=>$content,'user'=>$user,'card'=>$card,'title'=>$title]);
        
    }
}
