<?php

namespace App\Http\Controllers;

use App\Cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardsController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;

        $cards = Cards::userCards()->get();

        return view('card', ['cards' => $cards]);
    }
    public function store()
    {

        $user_id = Auth::user()->id;
        $card = new Cards();
        $card->name = request('name');
        $card->user_id = $user_id;
        $card->save();

//        $data = request()->validate([
//            'name' => 'required|min:3',
//        ]);
//        Cards::create($data);
        return back();

    }


//    public function validateRequest()
//    {
//        return request()->validate([
//            'name' => 'required|min:3',
//
//        ]);
//    }
}
