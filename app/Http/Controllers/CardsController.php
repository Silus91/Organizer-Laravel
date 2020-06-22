<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index()
    {
        $user = factory(\App\User::class)->create();

        $user->cards()->create([
            'name' => 'nowa karta 3',
        ]);
    
        dd($user->cards);
        
    }
}
