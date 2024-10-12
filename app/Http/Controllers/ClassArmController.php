<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ClassRoom;
use App\Models\ClassArm;
use Illuminate\Http\Request;

class ClassArmController extends Controller
{
    public function create($classroomId)
    {
        $classroom = ClassRoom::findOrFail($classroomId);
        return view('classarms.create', compact('classroom'));
    }

    public function storearm(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'class' => 'required|string|max:255',
            'arm' => 'required|string|max:1', // Assuming arm is a single letter (A-Z)
        ]);

        // Create a new class arm entry
        ClassArm::create([
            'owner_id' => auth()->id(), // Assuming the owner is the authenticated user
            'class' => $request->class,
            'arm' => $request->arm,
        ]);

        // Redirect or return response
        return redirect()->back()->with('success', 'Class arm added successfully!');
    }
    public function destroy($id)
    {
        $classArm = ClassArm::findOrFail($id);
        $classArm->delete();

        return back()->with('success', 'Class Arm deleted successfully.');
    }

    public function deletearm($id)
    {
        $classArm = ClassArm::findOrFail($id);
        $classArm->delete();

        return back()->with('success', 'Class Arm deleted successfully.');
    }
   
    


    public function viewarm(){
        $userid  = Auth::user()->id;
        $viewarm = ClassArm::where('owner_id', $userid)->get(); 
        return view('owner.viewarm', compact('viewarm'));
    }
}
