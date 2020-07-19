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
    public function index(Collection $collection, Request $request)
    {
        //przerobic na camel case variables
        $collection_id = $collection->id;
        $tasks = Task::query();
        if ($request->get('completed')) {
            $tasks->where('completed', 'true');
        }
        dd('sss');
        return $tasks->get();
//        $tasks = Task::where('collection_id', $collection_id)->get()->sort();

        return view('tasks.index', compact('tasks', 'collection_id'));
    }
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

    public function completed(Card $card, Collection $collection, Task $task, Request $request)
    {
        $task->completed = !$task->completed;
        $task->update($request->only(['completed' => $task->completed]));

        return redirect()->action('CardsController@show', [$card->id]);
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
