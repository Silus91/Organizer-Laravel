<?php

namespace App\Http\Controllers;

use App\Card;
use App\Task;
use App\Collection;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($collection_id)
    {
        $tasks = Task::where('collection_id', $collection_id)->get();
        return view('tasks.index', compact('tasks', 'collection_id'));
    }
//title value body
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Collection $collection, Card $card)
    {
        return view('cards.show', compact('card', 'collection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Card $card, $collection_id, Request $request)
    {
       $data = ($this->validateRequest());
        Task::create($request->all() + ['collection_id' => $collection_id]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection, Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */

    public function edit(Card $card, Collection $collection, Task $task)
    {
        return view('tasks.edit', compact('task', 'collection', 'card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Card $card, Collection $collection, Request $request, Task $task)
    {
        $data = ($this->validateRequest());
        $task->update($data);
        return redirect()->action('CardsController@show', [$card->id]);
    }

    public function completed(Card $card, Collection $collection, Task $task)
    {
        if ($task->completed == 'false'){
            $task->completed = 'true';
            $task->update(['title' => $task->title, 'completed' => $task->completed]);
            return redirect()->action('CardsController@show', [$card->id]);
        }
        else
        {
            $task->completed = 'false';
            $task->update(['completed' => $task->completed]);
            return redirect()->action('CardsController@show', [$card->id]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */

    public function destroy(Card $card, Collection $collection, Task $task)
    {
        $task->delete();
        return redirect()->action('CardsController@show', [$card->id]);
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:3',
            'value' => 'sometimes',
            'body' => 'sometimes'
        ]);
    }
}
