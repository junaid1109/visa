<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function index(Request $request)
    {
        $content = 'admin/card/index'; 
        $data = Card::all();
        $title = 'Card Management';

        return view('admin/master')->with(['content'=>$content,'data'=>$data,'title'=>$title]);
        
    }

    public function store(Request $request)
    {
        $content = 'user/card/index';
        $title = 'Card Management';
        Card::create([
            'user_id'=>Auth::id(),
            'name_on_card' => $request->name,
            'balance' => $request->balance,
        ]);

        return redirect()->route('user.card')
        ->with('success', 'Card created successfully. Admin will activate this card soon!');

    }

    public function update(Request $request)
    {
        Card::updateOrCreate(
                ['id' => $request->id],  
                [
                    'name_on_card' => $request->name,
                    'balance' => $request->balance,
                    'card_no' => $request->card_no,
                    'cvc' => $request->cvc,
                    'from_date' => $request->from_date,
                    'exp_date' => $request->exp_date,
                    'type' => $request->type,
                    'last4' => $request->last4,
                    'card_status' => 'Active',
                ]
                
        );

        return redirect()->route('vrtvrtregrtrtbteyb.card')
        ->with('success', 'Card Updated successfully.Now This Card is Active');

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
