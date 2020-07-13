<?php

namespace App\Http\Controllers;

use App\Card;
use App\Collection;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($card_id)
    {
        $collections = Collection::where('card_id', $card_id)->get();
        return view('cards.show', compact('collections', 'card_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($card_id)
    {
        return view('cards.show', compact('card_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Card $card, Request $request)
    {
        $data = ($this->validateRequest());
        Collection::create($request->all() + ['card_id' => $card->id]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show($card_id, Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit($card_id, Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update($card_id, Request $request, Collection $collection)
    {
        $data = ($this->validateRequest());
        $collection->update($data);
        return redirect()->action('CardsController@show', [$card_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy($card_id, Collection $collection)
    {
        $collection->delete();
        return redirect()->action('CardsController@show', [$card_id]);
    }

    public function validateRequest( )
    {
        return request()->validate([
            'name' => 'required|min:3'
        ]);
    }
}
