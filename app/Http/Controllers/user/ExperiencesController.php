<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperiencesController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->get();
        return view('user.experiences', [
            'experiences' => $experiences
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);
        try{
            $ex = new Experience();
            $ex->user_id = Auth::id();
            $ex->title = $request->title;
            $ex->description = $request->description;
            $ex->save();

            return redirect()->back()->with('success', 'successfully added new experience');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
