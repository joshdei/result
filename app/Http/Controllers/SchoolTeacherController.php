<?php

namespace App\Http\Controllers;

use App\Models\Student; // Import the Student model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassRoom;
use App\Models\Classsubject;
use App\Models\SchoolTeacher;
use App\Models\ClassArm;
use App\Models\SchoolDays;

use App\Models\StudentDays;
class SchoolTeacherController extends Controller
{
    public function teacherindex()
    {
        // Fetch students associated with the currently logged-in teacher
        $students = Student::where('teacher_id', Auth::id())->get();
        
        // Fetch the class of the logged-in teacher
        $teacher = SchoolTeacher::where('id', Auth::id())->first(); // Use first() to get a single instance
    
        if ($teacher) {
            // Access the class property of the teacher
            $class = $teacher->class;
        } else {
            // Handle the case where the teacher is not found (optional)
            $class = null; // Or some default value
        }
    
        // Pass the students and the class to the 'teacher.index' view
        return view('teacher.index', compact('students', 'class'));
    }
    
    

  
    public function create()
{
    // Fetch students associated with the logged-in teacher
    $students = Student::where('teacher_id', Auth::id())->get();
    
    // Fetch the class of the logged-in teacher (assumes one class)
    $teacherclass = SchoolTeacher::where('id', Auth::id())->pluck('class')->first(); // Fetch single class
    
    // Fetch the owner_id of the logged-in teacher
    $owner_id = SchoolTeacher::where('id', Auth::id())->pluck('owner_id')->first();
    
    // Fetch all class arms associated with the teacher's class
    $classArms = ClassArm::where('owner_id', $owner_id)
                ->where('class', $teacherclass)
                ->pluck('arm');  // Fetch only the arms

    // Return the view with the students, teacher's class, and class arms
    return view('student.create', compact('students', 'teacherclass', 'classArms'));
}

    
        
    
        // Store a newly created student in the database
        public function store(Request $request)
        {
            // Validate the incoming request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'class' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'arm' => 'required|string|max:255',
            ]);
    
            // Create a new student and associate with the current teacher
            Student::create([
                'name' => $validated['name'],
                'class' => $validated['class'],
                'gender' => $validated['gender'],
                'arm' => $validated['arm'],
                'teacher_id' => Auth::id(), // Assuming each student belongs to a teacher
            ]);
    
            return redirect()->route('teacherindex')->with('success', 'Student added successfully');
        }
    
        // Show the form for editing a student's details
        public function edit($id)
        {
            // Fetch the student by ID
            $student = Student::findOrFail($id);
    
            return view('student.edit', compact('student'));
        }
    
        // Update a student's information in the database
        public function update(Request $request, $id)
        {
            // Validate the incoming request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'class' => 'required|string|max:255',
                'arm' => 'required|string|max:255',
            ]);
    
            // Find the student by ID and update the record
            $student = Student::findOrFail($id);
            $student->update([
                'name' => $validated['name'],
                'class' => $validated['class'],
                'arm' => $validated['arm'],
            ]);
    
            return redirect()->route('teacherindex')->with('success', 'Student updated successfully');
        }
    
        // Delete a student from the database
        public function destroy($id)
        {
            // Find the student by ID and delete
            $student = Student::findOrFail($id);
            $student->delete();
    
            return redirect()->route('teacherindex')->with('success', 'Student deleted successfully');
        }

        public function destroydays($id)
        {
            // Find the student by ID and delete
            $student = SchoolDays::findOrFail($id);
            $student->delete();
    
            return redirect()->back()->with('success', 'Student deleted successfully');
        }

        
        public function subject()
{
    $userid = Auth::user()->id;
    $classRooms = ClassRoom::where('teacher_id', $userid)->get(); // Fetch classes taught by the teacher
    $classSubjects = Classsubject::where('teacher_id', $userid)->get(); // Fetch subjects taught by the teacher

    return view('teacher.teachersubject', compact('classRooms', 'classSubjects'));
}


public function stordays()
{
    // Fetch all school days for the authenticated teacher
    $schooldays = SchoolDays::where('teacher_id', Auth::id())->get(); // Use get() to retrieve all records

    return view('teacher.schooldays', compact('schooldays'));
}

public function storedays(Request $request)
        {
            // Validate the incoming request
            $validated = $request->validate([
                'days' => 'required|string|max:255',
            ]);
    
            // Create a new student and associate with the current teacher
            SchoolDays::create([
                'days' => $validated['days'],
                'teacher_id' => Auth::id(), // Assuming each student belongs to a teacher
            ]);
    
            return redirect()->back();
        }
    

        public function studentsaveDays(Request $request)
        {
            // Validate the incoming request
            $validated = $request->validate([
                'students.*.days' => 'required|integer|min:0', // Ensure days is an integer and not negative
            ]);
        
            // Loop through each student and save their days
            foreach ($request->students as $studentId => $data) {
                StudentDays::updateOrCreate(
                    ['student_id' => $studentId, 'teacher_id' => Auth::id()], // Find by student ID and teacher ID
                    ['days' => $data['days']]
                );
            }
        
            return redirect()->back()->with('success', 'Student days updated successfully!');
        }
        
   }
