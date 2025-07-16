<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Card;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('user/login');
    }

    public function dashboard(Request $request)
    {
        $content = 'user/dashboard/index'; 
        $title = 'User';
        $cards = Card::where('user_id',Auth::id())->get();
        return view('user/master')->with(['content'=>$content,'title'=>$title,'cards'=>$cards]);
        
    }

    public function settings(Request $request)
    {
        $content = 'user/settings/index'; 
        $title = 'User Profile';
        return view('user/master')->with(['content'=>$content,'title'=>$title]);
    }

    public function settingsStore(Request $request)
    {
        $check = User::find(Auth::id());
        $check->name = $request->name;
        $check->save();
        return redirect()->route('user.settings')
        ->with('success', 'Profile Updated Successfully.');
    }


}
