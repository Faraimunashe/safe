<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Criminal;
use Exception;
use Illuminate\Http\Request;

class CriminalController extends Controller
{
    public function index()
    {
        $criminals = Criminal::latest()->get();
        return view('admin.criminals', [
            'criminals' => $criminals
        ]);
    }

    public function criminal()
    {
        return view('admin.add-criminal');
    }

    public function add(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string'],
            'crime_id' => ['required', 'integer'],
            'place_id' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg','max:2048']
        ]);

        try{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $cm = new Criminal();
            $cm->fullname = $request->fullname;
            $cm->crime_id = $request->crime_id;
            $cm->place_id = $request->place_id;
            $cm->description = $request->description;
            $cm->image = $imageName;
            $cm->save();

            return redirect()->back()->with('success', 'successfully added criminal data');
        }catch(Exception $e)
        {
            return redirect()->back()->route('error', 'ERROR: '.$e->getMessage());
        }
    }

}
