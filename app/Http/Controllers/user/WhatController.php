<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Crime;
use Illuminate\Http\Request;

class WhatController extends Controller
{
    public function index()
    {
        $crimes = Crime::all();
        return view('user.what', [
            'crimes' => $crimes
        ]);
    }
}
