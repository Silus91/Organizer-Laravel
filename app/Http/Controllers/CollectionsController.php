<?php

namespace App\Http\Controllers;

use App\Card;
use App\Collection;
use App\Http\Requests\StoreCollectionRequest;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cardId)
    {
        $collections = Collection::where('card_id', $cardId)->get();
        return view('cards.show', compact('collections', 'cardId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cardId)
    {
        return view('cards.show', compact('cardId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Card $card, StoreCollectionRequest $request)
    {
        Collection::create($request->all() + ['card_id' => $card->id]);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update($cardId, StoreCollectionRequest $request, Collection $collection)
    {
        $data = ($this->validateRequest());
        $collection->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy($cardId, Collection $collection)
    {
        $collection->delete();
        return redirect()->action('CardsController@show', [$cardId]);
    }

    public function validateRequest( )
    {
        return request()->validate([
            'name' => 'required|min:3'
        ]);
    }
}
