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

    public function loginAsMember(Request $request) {
       
        try{
            $user = User::find(1);
            Auth::guard("web")->login($user);
        }catch(Exception $e) {
            return back()->with(['error' => [$e->getMessage()]]);
        }
        return redirect()->intended(route('user.home'));
    }


    public function dashboard(Request $request)
    {
        $content = 'admin/dashboard/index'; 
        $title = "Admin Dashboard";
        $users = User::all();
        $user = User::where('id','1')->first();
        $card = Card::all();
        return view('admin/master')->with(['content'=>$content,'user'=>$user,'users'=>$users,'card'=>$card,'title'=>$title]);
        
    }

    public function store(Request $request)
    {
        $type = $request->type;
        $user = User::where('id','1')->first();
        if($type=='virtual'){
            $user->virtual_card += $request->total;
        }
        elseif($type=='physical'){
            $user->physical_card += $request->total;
        }
       elseif($type=='balance'){
            $user->balance += $request->total;
        }
        $user->save();
        return redirect()->route('vrtvrtregrtrtbteyb.home')
        ->with('success', 'Added successfully.');
    }
}
