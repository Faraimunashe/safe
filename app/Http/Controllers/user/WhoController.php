<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Criminal;
use Illuminate\Http\Request;

class WhoController extends Controller
{
    public function index()
    {
        $criminals = Criminal::latest()->get();

        return view('user.who', [
            'criminals' => $criminals
        ]);
    }
}
