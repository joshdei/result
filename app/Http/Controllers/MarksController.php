<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mark;

class MarksController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_test_mark' => 'required|numeric',
            'second_test_mark' => 'required|numeric',
            'exam_mark' => 'required|numeric',
          
        ]);

        // Create a new mark entry
        Mark::create([
            'first_test_mark' => $request->first_test_mark,
            'second_test_mark' => $request->second_test_mark,
            'exam_mark' => $request->exam_mark,
            'owner_id' => Auth::id(), // Updated to reflect teacher_id
        ]);

        // Redirect back with success message
        return redirect()->route('viewscorespoint')->with('success', 'You have been logged out successfully!');
    }

    public function viewscorespoint()
{
    $userid = Auth::user()->id;
    $schoolsmarks = Mark::where('owner_id', $userid)->get();
    
    return view('owner.viewscorespoint', compact('schoolsmarks'));
}


    public function marksdestroy($id)
    {
        $teacher = Mark::findOrFail($id);
        $teacher->delete();

        return redirect()->route('viewscorespoint')->with('success', 'Teacher deleted successfully!');
    }
}
