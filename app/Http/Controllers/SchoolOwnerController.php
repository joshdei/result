<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ClassRoom;
use App\Models\Classsubject;
use App\Models\Schoolinfo;
use App\Models\SchoolTeacher;
use App\Models\TermReport;
use App\Models\Resumption;
use App\Models\AcademicTerm;

use App\Models\Terms;
class SchoolOwnerController extends Controller
{
    public function ownerdasboard(){
        $userid  = Auth::user()->id;
        $schoolteachers = SchoolTeacher::where('owner_id', $userid)->get(); 
        $schoolowner = Schoolinfo::where('owner_id', $userid)->get(); 
        return view('owner.index', compact('schoolteachers','schoolowner'));
    }
    public function addteacher(){
        return view ('owner.add');
    }
    public function addsubject()
    {
        $ownerId = auth()->id(); // Assuming the owner is logged in
        $classes = ClassRoom::where('owner_id', $ownerId)->get();
    
        return view('owner.addsubject', compact('classes'));
    }
    

   

    public function storeteacher(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:school_teachers,email',
        'password' => 'required|string|min:6',
        'phone' => 'required|string|max:15',
        'class' => 'required|string|max:50',
        'dob' => 'nullable|date',
        'address' => 'nullable|string|max:255',
        'hire_date' => 'nullable|date',
        'passport_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Updated field name
    ]);

    // Create a new teacher entry
    $teacher = new SchoolTeacher();
    $teacher->owner_id = Auth::id();
    $teacher->name = $request->name; // Corrected field name
    $teacher->email = $request->email; // Corrected field name
    $teacher->password = bcrypt($request->password); // Hashing the password
    $teacher->phone = $request->phone; // Corrected field name
    $teacher->class = $request->class; // Added field
    $teacher->dob = $request->dob; // Added field
    $teacher->address = $request->address; // Added field
    $teacher->hire_date = $request->hire_date; // Added field
    $teacher->save();

    // Handle file uploads and save to Image model
    if ($request->hasFile('passport_photo')) { // Updated field name
        $image = $request->file('passport_photo');

        if ($image->getSize() > 4096 * 1024) { // Check if image size exceeds 4MB
            return redirect()
                ->back()
                ->withErrors(['passport_photo' => 'The image is too large. Please upload an image smaller than 4MB.'])
                ->withInput();
        }

        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('teachers/photos'), $imageName);

        // Assuming you have an Image model
        $imageModel = new Image();
        $imageModel->teacher_id = $teacher->id; // Assuming 'teacher_id' references the teacher
        $imageModel->path = 'teachers/photos/' . $imageName;
        $imageModel->save();
    }

    // Redirect back with success message
   
    return redirect()->route('/')->with('success', 'Teacher updated successfully!');
}

public function viewsubject()
{
    // Fetch all classes owned by the authenticated user
    $classes = ClassRoom::where('owner_id', Auth::user()->id)->get(); 
    return view('owner.viewsubject', compact('classes'));
}


public function viewClassSubjects($class_id)
{
    // Retrieve the class and its subjects
    $class = ClassRoom::findOrFail($class_id); // Fetch the class based on class_id
    $subjects = Classsubject::where('class_id', $class_id)->get(); // Fetch subjects related to the class

    // Pass data to the view
    return view('owner.viewclasssubject', compact('class', 'subjects'));
}



public function subjectdestroy($id)
    {
        $teacher = Classsubject::findOrFail($id);
        $teacher->delete();

        return redirect()->route('/')->with('success', 'Teacher deleted successfully!');
    }

    public function edit($id)
    {
        $teacher = SchoolTeacher::findOrFail($id);  // Fetch the teacher by ID
        return view('owner.edit', compact('teacher'));
    }

    // Method to update a teacher
    public function update(Request $request, $id)
    {
        // Find the teacher by ID or throw a 404 if not found
        $teacher = SchoolTeacher::findOrFail($id);
    
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'class' => 'required|string|max:50',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'hire_date' => 'nullable|date',
            'gender' => 'required|string|in:Male,Female,Other', // Validate gender
            'passport_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Optional file upload validation
        ]);
    
        // Update the teacher with the validated data
        $teacher->update($validatedData);
    
        // Handle the file upload for passport photo, if provided
        if ($request->hasFile('passport_photo')) {
            // Store the file and save the path
            $path = $request->file('passport_photo')->store('teachers/photos', 'public');
    
            // Update the teacher's passport photo path
            $teacher->passport_photo = $path;
            $teacher->save();
        }
    
        // Redirect back to the dashboard with a success message
        return redirect()->route('/access')->with('success', 'Teacher updated successfully!');
    }
    

    // Method to delete a teacher
    public function destroy($id)
    {
        $teacher = SchoolTeacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('/access')->with('success', 'Teacher deleted successfully!');
    }


    public function complete()
    {
        $userid = Auth::user()->id;
    
        // Check if the school owner record exists
        $schoolowner = Schoolinfo::where('owner_id', $userid)->first(); // Use first() to get one record
    
        if ($schoolowner) {
            // Redirect to the home page
            return redirect('/access');
        } else {
            // Return the view if no record is found
            return view('owner.complete');
        }
    }
    
    public function addclass(){
        $userid  = Auth::user()->id;
        $schoolteachers = SchoolTeacher::where('owner_id', $userid)->get(); 
        return view('owner.addclass', compact('schoolteachers'));
    }


    public function ownerofschoolcomplete(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'school_name' => 'required|string|max:255',
            'school_email' => 'required|email|max:255',
            'school_motto' => 'required|string|max:255',
            'number_of_classes' => 'required|integer|min:1',
            'number_of_teachers' => 'required|integer|min:1',
            'school_address' => 'required|string|max:255',
            'owner_gender' => 'required|string|in:Male,Female,Other',
            'school_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'owner_passport' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'owner_nin' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Create a new school owner entry
        $schoolOwner = new SchoolInfo();
        $schoolOwner->owner_id = Auth::id();
        $schoolOwner->school_name = $request->school_name;
        $schoolOwner->school_email = $request->school_email;
        $schoolOwner->school_motto = $request->school_motto;
        $schoolOwner->number_of_classes = $request->number_of_classes;
        $schoolOwner->number_of_teachers = $request->number_of_teachers;
        $schoolOwner->school_address = $request->school_address;
        $schoolOwner->owner_gender = $request->owner_gender;
    
        // Handle file uploads
        if ($request->hasFile('school_logo')) {
            $logo = $request->file('school_logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('uploads/logos'), $logoName);
            $schoolOwner->school_logo = 'uploads/logos/' . $logoName; // Store the relative path
        }
    
        if ($request->hasFile('owner_passport')) {
            $passport = $request->file('owner_passport');
            $passportName = time() . '_' . $passport->getClientOriginalName();
            $passport->move(public_path('uploads/passports'), $passportName);
            $schoolOwner->owner_passport = 'uploads/passports/' . $passportName; // Store the relative path
        }
    
        if ($request->hasFile('owner_nin')) {
            $nin = $request->file('owner_nin');
            $ninName = time() . '_' . $nin->getClientOriginalName();
            $nin->move(public_path('uploads/nins'), $ninName);
            $schoolOwner->owner_nin = 'uploads/nins/' . $ninName; // Store the relative path
        }
    
        // Save the school owner data to the database
        $schoolOwner->save();
    
        // Redirect back with success message
        return redirect()->route('/')->with('success', 'School owner created successfully!');
    }
    
public function storeclass(Request $request)
{
    $request->validate([
        'class' => 'required|string|max:255',
        'teacher_id' => 'required|exists:school_teachers,id', // Validate that the teacher ID exists
    ]);

    // Check for existing classroom with the same class and teacher
    $existingClass = ClassRoom::where('class', $request->class)
                               ->where('teacher_id', $request->teacher_id)
                               ->first();

    if ($existingClass) {
        return redirect()->route('viewteacher')->with('error', 'This teacher is already assigned to this class!');
    }

    // Create the new classroom
    ClassRoom::create([
        'owner_id' => Auth::id(),
        'class' => $request->class,
        'teacher_id' => $request->teacher_id,
    ]);

    return redirect()->route('viewteacher')->with('success', 'Class added successfully!');
}


public function viewteacher()
{
    $owner_id = Auth::id();
    
    // Fetch classrooms with associated owner and teacher details
    $classrooms = ClassRoom::with(['teacher', 'owner']) // Assuming 'teacher' and 'owner' relationships
                           ->where('owner_id', $owner_id)
                           ->get();

    // Pass the classrooms data to the view
    return view('owner.viewteacher', compact('classrooms'));
}



public function editteacher($id)
{
    $classRoom = ClassRoom::findOrFail($id); // Find the class or return a 404
    return view('owner.editclass', compact('classRoom')); // Load a view for editing the class
}


public function destroyteacher($id)
{
    $classRoom = ClassRoom::findOrFail($id); // Find the class or return a 404
    $classRoom->delete(); // Delete the class

    return redirect()->route('owner.viewteacher')->with('success', 'Class deleted successfully!');
}


public function addarm(){

    return view ('owner.addarm');
}


public function addscorespoint(){
    return view('owner.addscorespoint');
}

public function termsession()
{
    $id = Auth::id();
    $academicterms = AcademicTerm::where('owner_id',$id)->get();
    return view('owner.termreport', compact('academicterms'));
}
public function termstore(Request $request)
{
    $validatedData = $request->validate([
        'session' => 'required|string',
        'start_date' => 'required|date',
    ]);

    // Ensure the user is authenticated
    if (!Auth::check()) {
        return redirect()->route('/')->with('error', 'You need to be logged in to create an academic term.');
    }

    // Create a new academic term record
    AcademicTerm::create([
        'session' => $validatedData['session'],
        'start_date' => $validatedData['start_date'],
        'owner_id' => Auth::id(), // This will now be set correctly if the user is logged in
    ]);

    return redirect()->route('/')->with('success', 'Term report created successfully.');
}

public function destroyterm($id)
{
    // Find the AcademicTerm by ID or fail with a 404
    $academicTerm = AcademicTerm::findOrFail($id);
    
    // Delete the found AcademicTerm
    $academicTerm->delete();

    // Redirect back to the previous page with a success message
    return redirect()->back()->with('success', 'Academic term deleted successfully.');
}

public function termresumption(){
    $id = Auth::id();
    $resumptionDates = Resumption::where('owner_id',$id)->get();
    return view('owner.resumption', compact('resumptionDates'));

}

public function resumptionstore(Request $request)
{
    $validatedData = $request->validate([
        'resumption_date' => 'required|string',
    ]);

    // Ensure the user is authenticated
    if (!Auth::check()) {
        return redirect()->route('/')->with('error', 'You need to be logged in to create an academic term.');
    }

    // Create a new academic term record
    Resumption::create([
        'date_of_resumption' => $validatedData['resumption_date'],
        'owner_id' => Auth::id(), // This will now be set correctly if the user is logged in
    ]);

    return redirect()->route('termresumption')->with('success', 'Term report created successfully.');
}



public function terms(){
    $id = Auth::id();
    $academicterms = Terms::where('owner_id',$id)->get();
    return view('owner.terms', compact('academicterms'));

}

public function destroyResumption($id)
{
    // Find the AcademicTerm by ID or fail with a 404
    $academicTerm = Resumption::findOrFail($id);
    
    // Delete the found AcademicTerm
    $academicTerm->delete();

    // Redirect back to the previous page with a success message
    return redirect()->back()->with('success', 'Academic term deleted successfully.');
}

public function destroyterms($id)
{
    // Find the AcademicTerm by ID or fail with a 404
    $academicTerm = Terms::findOrFail($id);
    
    // Delete the found AcademicTerm
    $academicTerm->delete();

    // Redirect back to the previous page with a success message
    return redirect()->back()->with('success', 'Academic term deleted successfully.');
}

public function storeterms(Request $request)
{
    $request->validate([
        'session' => 'required|string',
    ]);

    $term = new Terms();
    $term->terms = $request->input('session');
    $term->owner_id = Auth::id();// Set start date, modify this logic as needed
    $term->save();

    return redirect()->back()->with('success', 'Academic term added successfully.');
}

}
