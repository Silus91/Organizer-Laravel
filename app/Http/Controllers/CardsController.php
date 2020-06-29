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

        return view('cards.index', ['cards' => $cards]);
    }


    public function create()
    {
        return view('cards.create');
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
        return redirect('cards');

    }

    public function show(Cards $card)
    {
        return view('cards.show', compact('card'));
    }

}
