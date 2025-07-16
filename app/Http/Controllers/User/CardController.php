<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function index(Request $request)
    {
        $content = 'user/card/index'; 
        $data = Card::where('user_id',Auth::id())->get();
        $title = 'Card Management';
        return view('user/master')->with(['content'=>$content,'data'=>$data,'title'=>$title]);
        
    }

    public function store(Request $request)
    {
        $content = 'user/card/index';
        $title = 'Card Management';
        Card::create([
            'user_id'=>Auth::id(),
            'name_on_card' => $request->name,
            'balance' => $request->amount,
            'email' => $request->email,
        ]);

        return redirect()->route('user.card')
        ->with('success', 'Card created successfully. Admin will activate this card soon!');

    }

    public function fetchCard(Request $request){

        $data = Card::find($request->id);
        return response()->json([
            'status'=>200,
            'data'=>$data,
            'message'=>'fetch Successfully',
        ]);
    }


}
