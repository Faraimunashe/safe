<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Models\Crime;
use App\Models\Criminal;
use App\Models\Place;
use Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $advices = Advice::latest()->get();
        return view('admin.dashboard', [
            'advices' => $advices
        ]);
    }

    public function advice()
    {
        return view('admin.create-advice');
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string']
        ]);

        try{
            $ad = new Advice();
            $ad->title = $request->title;
            $ad->context = $request->content;
            $ad->save();

            return redirect()->back()->with('success', 'successfully added advice');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
