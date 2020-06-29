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
        $data = ($this->validateRequest());


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
    public function edit(Cards $card)
    {
        return view('cards.edit', compact('card'));
    }
    public function update(Cards $card)
    {
        $data = ($this->validateRequest());
        $card->update($data);
        return redirect('cards/' . $card->id);
    }

    public function destroy(Cards $card)
    {
        $card->delete();
        return redirect('cards');
    }

    public function validateRequest( )
    {
        return request()->validate([
            'name' => 'required|min:3'
        ]);
    }

}
