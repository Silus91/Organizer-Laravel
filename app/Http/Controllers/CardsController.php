<?php

namespace App\Http\Controllers;

use App\Cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Cards::userCards()->get();
        $user = Auth::user();

        return view('card', ['cards' => $cards]);
    }

    public function store()
    {
        $data = request()->validate([
           'name' => 'required|min:3',
        ]);

        $user_id = Auth::user()->id;
        $card = new Cards();
        $card->name = request('name');
        $card->user_id = $user_id;
        $card->save();


//        Cards::create($data);
        return back();

    }

}
