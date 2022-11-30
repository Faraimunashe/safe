<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class WhereController extends Controller
{
    public function index()
    {
        $places = Place::latest()->get();
        return view('user.where', [
            'places' => $places
        ]);
    }
}
