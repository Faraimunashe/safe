<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use Illuminate\Http\Request;

class AdviceController extends Controller
{
    public function index()
    {
        $advices = Advice::latest()->paginate(10);
        return view('user.advice', [
            'advices' => $advices
        ]);
    }
}
