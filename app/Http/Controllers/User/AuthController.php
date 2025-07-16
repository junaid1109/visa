<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Card;

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

}
