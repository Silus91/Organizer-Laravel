<?php

namespace App\Http\Controllers;

use App\Card;
use App\Collection;
use App\Http\Requests\StoreCardRequest;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('cards.index', ['cards' => $user->cards]);
    }

    public function create()
    {
        return view('cards.create');
    }

    public function store(StoreCardRequest $request)
    {
        $userId = Auth::user()->id;
        Card::create($request->all() + ['user_id' => $userId]);
        return redirect('cards');
    }

    public function show(Card $card, Collection $collection, Task $task)
    {
        $collections = $card->collections()->with(['tasks' => function ($query) {
            $query->orderBy('completed');
        }])->get();

        return view('cards.show', compact('card', 'collections'));
    }

    public function update(Card $card)
    {
        $data = ($this->validateRequest());
        $card->update($data);
        return redirect('cards/' . $card->id);

        $userId = Auth::user()->id;
        Card::create($request->all() + ['user_id' => $userId]);
        return redirect('cards');
    }

    public function destroy(Card $card)
    {
        $card->delete();
        return redirect('cards');
    }

    private function validateRequest( )
    {
        return request()->validate([
            'name' => 'required|min:3'
        ]);
    }

}
