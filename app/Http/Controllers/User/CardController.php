<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\CardMail;
use Illuminate\Support\Facades\Mail;

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
        $user = User::find(Auth::id());

        if ($user->balance < $request->amount) {
            return redirect()->route('user.card')->with('error', 'Insufficient balance.');
        }

        if ($request->card_type == 'Virtual' && $user->virtual_card < 1) {
            return redirect()->route('user.card')->with('error', 'No virtual card remaining.');
        }

        if ($request->card_type == 'Physical' && $user->physical_card < 1) {
            return redirect()->route('user.card')->with('error', 'No physical card remaining.');
        }

        if ($request->card_category == 'Visa' && $user->visa_card < 1) {
            return redirect()->route('user.card')->with('error', 'No Visa card remaining.');
        }

         if ($request->card_category == 'Master' && $user->master_card < 1) {
            return redirect()->route('user.card')->with('error', 'No Master card remaining.');
        }

        $details = Card::create([
                    'user_id'=>Auth::id(),
                    'name_on_card' => $request->name,
                    'balance' => $request->amount,
                    'card_type' => $request->card_type,
                    'card_category' => $request->card_category,
                    'phone_no' => $request->phone_no,
                    'email' => $request->email,
                ]);

        $user->decrement($request->card_type == 'Virtual' ? 'virtual_card' : 'physical_card');
        $user->decrement($request->card_category == 'Master' ? 'master_card' : 'visa_card');
        $user->decrement('balance', $request->amount);

        Mail::to($request->email)->queue(new CardMail($details));

        return redirect()->route('user.card')
        ->with('success', 'Card created successfully. Admin will activate this card soon!');

    }

    public function fetchCard(Request $request)
    {

        $data = Card::find($request->id);
        return response()->json([
            'status'=>200,
            'data'=>$data,
            'message'=>'fetch Successfully',
        ]);
    }

    public function toggleStatus($id)
    {
        $card = Card::findOrFail($id);
        $card->is_freezed = !$card->is_freezed;
        $card->save();

        return back()->with('success', 'Card status updated successfully.');
    }



}
