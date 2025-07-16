<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TreasuryController extends Controller
{
     public function index(Request $request)
    {
        $content = 'user/treasury/index'; 
        $data = Card::where('user_id',Auth::id())->get();
        $title = 'Treasury';
        return view('user/master')->with(['content'=>$content,'data'=>$data,'title'=>$title]);
        
    }
}
