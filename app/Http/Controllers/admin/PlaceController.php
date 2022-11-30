<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Exception;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::latest()->get();
        return view('admin.places', [
            'places' => $places
        ]);
    }

    public function place()
    {
        return view('admin.create-place');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);

        try{
            $place = new Place();
            $place->name = $request->name;
            $place->save();

            return redirect()->back()->with('success', 'successfully added a new place');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
