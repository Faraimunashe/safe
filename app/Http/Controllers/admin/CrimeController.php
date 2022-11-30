<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    public function index()
    {
        $crimes = Crime::latest()->get();
        return view('admin.crimes', [
            'crimes' => $crimes
        ]);
    }

    public function crime()
    {
        return view('admin.create-crime');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);

        try{
            $crime = new Crime();
            $crime->name = $request->name;
            $crime->save();

            return redirect()->back()->with('success', 'successfully added a new crime');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
