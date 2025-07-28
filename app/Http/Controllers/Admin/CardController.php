<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\User;

class CardController extends Controller
{
    public function index(Request $request)
    {
        $content = 'admin/card/index'; 
        $data = Card::all();
        $title = 'Card Management';

        return view('admin/master')->with(['content'=>$content,'data'=>$data,'title'=>$title]);
        
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
                    'category' => $request->category,
                    'phone_no' => $request->phone_no,
                    'last4' => $request->last4,
                    'email' => $request->email,
                    'pin' => $request->pin,
                    'card_status' => 'Active',
                ]
                
        );

        return redirect()->route('vrtvrtregrtrtbteyb.card')
        ->with('success', 'Card Updated successfully.Now This Card is Active');
    }

    public function statusUpdate(Request $request)
    {
        $card = Card::find($request->cardId);
        $card->card_status = 'Reject';
        $card->reject_reason = $request->reject_reason;
        $card->save();
        
        $user = User::find(1);
        $user->increment($card->card_type == 'Virtual' ? 'virtual_card' : 'physical_card');
        $user->increment($card->card_category == 'Master' ? 'master_card' : 'visa_card');
        $user->increment('balance', $card->balance);

        return redirect()->route('vrtvrtregrtrtbteyb.card')
        ->with('success', 'Card Updated successfully.Now This Card is Reject');
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
