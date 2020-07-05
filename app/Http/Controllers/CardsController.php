<?php

namespace App\Http\Controllers;

use App\Card;
use App\Collection;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Card::userCards()->get();
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
        $card = new Card();
        $card->name = request('name');
        $card->user_id = $user_id;
        $card->save();

        return redirect('cards');
    }

    public function show(Card $card, Collection $collection, Task $task)
    {
        $collection_id = $collection->id;
        $tasks = Task::where('collection_id', $collection_id);
        $card_id = $card->id;
        $collections = Collection::where('card_id', $card_id)->get();

        return view('cards.show', compact('card', 'collections', 'tasks'));
    }
    public function edit(Card $card)
    {
        return view('cards.edit', compact('card'));
    }
    public function update(Card $card)
    {
        $data = ($this->validateRequest());
        $card->update($data);
        return redirect('cards/' . $card->id);
    }

    public function destroy(Card $card)
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
