<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('collections.index', compact('collections', 'card_id'));
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
    public function store($card_id, Request $request)
    {
        $data = ($this->validateRequest());
        Collection::create($request->all() + ['card_id' => $card_id]);
        return  redirect()->route('cards.collections.index', $card_id);
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
        return view('collections.edit', compact('card_id', 'collection'));
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
        return  redirect()->route('cards.collections.index', $card_id);
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
        return  redirect()->route('cards.collections.index', $card_id);
    }

    public function validateRequest( )
    {
        return request()->validate([
            'name' => 'required|min:3'
        ]);
    }
}
