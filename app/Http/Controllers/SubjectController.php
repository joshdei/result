<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classsubject;
use App\Models\ClassRoom;
class SubjectController extends Controller
{
    public function store(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'class_id' => 'required|exists:class_rooms,id',
        'core_subjects' => 'nullable|array',
        'elective_subjects' => 'nullable|array',
    ]);

    // Get the class by ID
    $class = ClassRoom::findOrFail($request->class_id);

    // Check if the class has an assigned teacher
    $teacher_id = $class->teacher_id;

    // Combine core and elective subjects into one array
    $subjects = array_merge($request->core_subjects ?? [], $request->elective_subjects ?? []);

    // Save subjects to the classsubject table
    foreach ($subjects as $subject) {
        Classsubject::create([
            'class_id' => $class->id,
            'subject_name' => $subject,
            'teacher_id' => $teacher_id, // Use the teacher assigned to the class
        ]);
    }

    return redirect()->route('viewsubject')->with('success', 'Teacher deleted successfully!');
}

}
