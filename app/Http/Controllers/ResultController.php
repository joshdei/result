<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Mark;
use App\Models\Student;
use App\Models\SchoolTeacher;
use App\Models\Classsubject;
use App\Models\Studentscores;
use App\Models\StudentSkill;
use App\Models\ClassRoom;
use App\Models\StudentBehavior;
use App\Models\StudentRemark;
use App\Models\Principalremarks;
use App\Models\User;
use App\Models\StudentDays;
use App\Models\SchoolDays;
use App\Models\Terms;
use App\Models\AcademicTerm;
use App\Models\SchoolInfo;
use App\Models\Resumption;
class ResultController extends Controller
{
   
    public function store(Request $request)
    {
        // Define the maximum marks allowed
        $maxMarks = 100;
    
        // Validate the request
        $request->validate([
            'first_test_mark' => 'required|numeric|max:' . $maxMarks,
            'second_test_mark' => 'required|numeric|max:' . $maxMarks,
            'exam_mark' => 'required|numeric|max:' . $maxMarks,
            'owner_id' => 'required|exists:students,id', // Ensure student exists
        ]);
    
        // Create a new mark entry
        Mark::create([
            'first_test_mark' => $request->first_test_mark,
            'second_test_mark' => $request->second_test_mark,
            'exam_mark' => $request->exam_mark,
            'owner_id' => Auth::id(),
        ]);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Marks have been added successfully!');
    }

    public function result()
{
    $userid = Auth::user()->id;

    // Fetch the teacher associated with the authenticated user
    $teacher = SchoolTeacher::where('id', $userid)->first();

    // Initialize students collection
    $students = collect();

    // Check if the teacher exists
    if ($teacher) {
        // Fetch students related to this teacher
        $students = Student::where('teacher_id', $teacher->id)->get();
    }

    // Pass the students to the view
    return view('teacher.result', compact('students'));
}


public function storeScores(Request $request)
{
    // Validate the request data
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'first_test.*' => 'nullable|numeric|min:0|max:10',   // 1st test max score is 10
        'second_test.*' => 'nullable|numeric|min:0|max:20',  // 2nd test max score is 20
        'exam.*' => 'nullable|numeric|min:0|max:70',         // Exam max score is 70
    ]);

    $studentId = $request->input('student_id');
    $firstTests = $request->input('first_test');
    $secondTests = $request->input('second_test');
    $exams = $request->input('exam');

    // Loop through each subject and save the scores
    foreach ($firstTests as $subject => $firstTestScore) {
        $secondTestScore = $secondTests[$subject] ?? null;
        $examScore = $exams[$subject] ?? null;

        // Save the scores to the Studentscores model
        Studentscores::updateOrCreate(
            [
                'student_id' => $studentId,
                'subject' => $subject
            ],
            [
                'first_test' => $firstTestScore,
                'second_test' => $secondTestScore,
                'exam' => $examScore
            ]
        );
    }

    return redirect()->back()->with('success', 'Scores have been successfully saved.');
}




    public function studentscores($id)
{
    $student = Student::find($id);
    $finalsubject = [];
    if (!$student) {
        return redirect()->route('teacher.index')->with('error', 'Student not found.');
    }
    $student_teacher_id = $student->teacher_id;
    if ($student_teacher_id) {
        $schoolTeacher = SchoolTeacher::find($student_teacher_id);
        if ($schoolTeacher) {
            $classSubjects = Classsubject::where('teacher_id', $student_teacher_id)->get();
            $finalsubject = $classSubjects->pluck('subject_name')->toArray();
        }
    }

    // Pass the student and subjects to the view
    return view('teacher.studentscores', compact('student', 'finalsubject'));
}






public function remark()
{
    // Fetch students associated with the currently logged-in teacher
    $students = Student::where('teacher_id', Auth::id())->get();

    // Pass the students to the 'teacher.index' view
    return view('teacher.remark', compact('students'));
}

public function saveSkills(Request $request)
{
    $students = $request->input('students');

    foreach ($students as $id => $skills) {
        // Validate input
        $validatedSkills = $request->validate([
            "students.{$id}.handwriting" => 'integer|between:1,5|nullable',
            "students.{$id}.fluency" => 'integer|between:1,5|nullable',
            "students.{$id}.sports" => 'integer|between:1,5|nullable',
            "students.{$id}.craft" => 'integer|between:1,5|nullable',
            "students.{$id}.drawing" => 'integer|between:1,5|nullable',
            "students.{$id}.music" => 'integer|between:1,5|nullable',
            "students.{$id}.home_management" => 'integer|between:1,5|nullable',
            "students.{$id}.swimming" => 'integer|between:1,5|nullable',
        ]);

        // Check if student skill exists or create new
        $studentSkill = StudentSkill::updateOrCreate(
            ['student_id' => $id], // Find by student_id
            $skills // Update or insert new values
        );
    }

    return redirect()->back()->with('success', 'Student skills updated successfully!');
}


public function saveBehavior(Request $request)
{
    $students = $request->input('students');

    foreach ($students as $id => $behavior) {
        // Validate input
        $validatedBehavior = $request->validate([
            "students.{$id}.punctuality" => 'integer|between:1,5|nullable',
            "students.{$id}.assignment_submission" => 'integer|between:1,5|nullable',
            "students.{$id}.sense_of_responsibility" => 'integer|between:1,5|nullable',
            "students.{$id}.neatness" => 'integer|between:1,5|nullable',
            "students.{$id}.cooperation" => 'integer|between:1,5|nullable',
            "students.{$id}.participation" => 'integer|between:1,5|nullable',
            "students.{$id}.respectfulness" => 'integer|between:1,5|nullable',
            "students.{$id}.overall_behavior" => 'integer|between:1,5|nullable',
        ]);

        // Check if student behavior exists or create new
        $studentBehavior = StudentBehavior::updateOrCreate(
            ['student_id' => $id], // Find by student_id
            $behavior // Update or insert new values
        );
    }

    return redirect()->back()->with('success', 'Student behaviors updated successfully!');
}



public function behavior()
{
    // Fetch students associated with the currently logged-in teacher
    $students = Student::where('teacher_id', Auth::id())->get();

    // Pass the students to the 'teacher.index' view
    return view('teacher.behaviour', compact('students'));
}

public function remarksstudent(){
    $students = Student::where('teacher_id', Auth::id())->get();

    // Pass the students to the 'teacher.index' view
    return view('teacher.remarksstudent', compact('students'));
}

public function saveRemarks(Request $request)
{
    $data = $request->all();

    foreach ($data['students'] as $studentId => $studentData) {
        StudentRemark::create([
            'student_id' => $studentId,
            'remark' => $studentData['remark'],
            'teacher_id' => auth()->user()->id, // Assuming the teacher is logged in
        ]);
    }

    return redirect()->back()->with('success', 'Remarks saved successfully.');
}


public function principalremarks()
{
    // Fetch students associated with the currently logged-in teacher
    $students = Student::where('teacher_id', Auth::id())->get();

    // Pass the students to the 'teacher.index' view
    return view('teacher.principal_remarks', compact('students'));
}


public function savePrincipalremarks(Request $request)
{
    $data = $request->all();

    foreach ($data['students'] as $studentId => $studentData) {
        Principalremarks::create([
            'student_id' => $studentId,
            'remark' => $studentData['remark'],
            'teacher_id' => auth()->user()->id, // Assuming the teacher is logged in
        ]);
    }

    return redirect()->back()->with('success', 'Remarks saved successfully.');
}




    public function studentresult($id)
    {
        $student_id = $id;
        $teacher_id = Auth::id();

        // Fetch teacher information
        $teacher_info = SchoolTeacher::where('id', $teacher_id)->first();
        
        if (!$teacher_info) {
            return redirect()->back()->with('error', 'Teacher not found.');
        }

        $teacher_owner = $teacher_info->owner_id;
        $teacher_owner_id = $teacher_info->owner_id;
        $principal = User::where('id', $teacher_owner_id)->first();

        // Fetch school information
        $school_info = SchoolInfo::where('owner_id', $teacher_owner)->first();
        
        if (!$school_info) {
            return redirect()->back()->with('error', 'School information not found.');
        }

        // Fetch student information
        $student = Student::where('id', $student_id)->first();
        
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        // Fetch the subjects taught by the teacher
        $class_subjects = Classsubject::where('teacher_id', $teacher_id)->get();

        // Fetch total school days
        $schooldays = SchoolDays::where('teacher_id', $teacher_id)->pluck('days')->first();

        // Fetch student scores for each subject
        $student_scores = Studentscores::where('student_id', $student_id)->get();

        // Fetch student behavior assessment
        $studentBehavior = StudentBehavior::where('student_id', $student_id)->first();

        // Fetch total days the student attended
        $studentdays = StudentDays::where('student_id', $student_id)->sum('days');

        // Fetch student skills assessment
        $studentSkills = StudentSkill::where('student_id', $student_id)->first();

        // Fetch student remark
        $studentRemark = StudentRemark::where('student_id', $student_id)->first();
        $studentarm = Student::where('id', $student_id)->first();

        // Fetch principal remarks
        $principalRemarks = Principalremarks::where('student_id', $student_id)->first();

        // Helper function to convert a number to an ordinal format (e.g., 1st, 2nd, 3rd)
        function getOrdinal($number) {
            $ends = ['th','st','nd','rd','th','th','th','th','th','th'];
            if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
                return $number.'th';
            }
            return $number.$ends[$number % 10];
        }

        // Combine subjects with scores for easier display
        $results = [];
        $student_total_score = 0; // To accumulate the student's total score

        foreach ($class_subjects as $subject) {
            // Find the score for this subject based on subject name
            $score = $student_scores->firstWhere('subject', $subject->subject_name);
            
            // Calculate total score for the subject
            $totalScore = $score ? round($score->first_test) + round($score->second_test) + round($score->exam) : 0;
            
            // Accumulate total score for this student
            $student_total_score += $totalScore;

            // Fetch all students in the class for this subject
            $subject_scores = Studentscores::where('subject', $subject->subject_name)
                ->whereIn('student_id', Student::where('class', $student->class)->pluck('id'))
                ->get();

            $subject_scores_array = [];
            foreach ($subject_scores as $student_score) {
                $totalSubjectScore = round($student_score->first_test) + round($student_score->second_test) + round($student_score->exam);
                $subject_scores_array[$student_score->student_id] = $totalSubjectScore;
            }

            // Sort scores in descending order
            arsort($subject_scores_array);
            
            // Determine position for the current student in the subject
            $subject_position = array_search($student_id, array_keys($subject_scores_array)) + 1;

            // Convert the position to ordinal format (e.g., 1st, 2nd, 3rd)
            $formatted_position = getOrdinal($subject_position);

            $results[] = [
                'subject_name' => $subject->subject_name,
                'first_test' => $score ? round($score->first_test) : 0,
                'second_test' => $score ? round($score->second_test) : 0,
                'exam' => $score ? round($score->exam) : 0,
                'total' => $totalScore,
                'average' => $totalScore ? round($totalScore / 3) : 0,
                'grade' => $this->calculateGrade($totalScore),
                'position' => $formatted_position,  // Add formatted ordinal position here
                'remark' => $this->determineRemark($totalScore),
            ];
        }

        // Calculate total possible score
        $total_subjects = count($class_subjects);
        $total_possible_score = $total_subjects * 300; // 300 for each subject (3 tests x 100)

        // Fetch all students in the class to calculate class averages and positions
        $students_in_class = Student::where('class', $student->class)->get();
        $class_scores = []; // Array to store all class total scores
        
        foreach ($students_in_class as $class_student) {
            $scores = Studentscores::where('student_id', $class_student->id)->get();
            $totalClassScore = 0;

            foreach ($scores as $score) {
                $totalClassScore += round($score->first_test) + round($score->second_test) + round($score->exam);
            }
            
            $class_scores[$class_student->id] = $totalClassScore; // Store the total score keyed by student ID
        }

        // Sort the scores in descending order
        arsort($class_scores);
        
        // Determine the position of the current student in the class
        $position = array_search($student_total_score, array_keys($class_scores)) + 1; // Add 1 to make it 1-based index

        // Calculate highest and lowest class averages
        $class_averages = array_map(function ($score) {
            return $score / 3; // Calculate average from total score
        }, $class_scores);

        $highestAverage = !empty($class_averages) ? max($class_averages) : 0;
        $lowestAverage = !empty($class_averages) ? min($class_averages) : 0;

        $date_of_resumption = Resumption::where('owner_id', $teacher_owner)->first();
        $classSize = Student::where('class', $student->class)->count();
        $classRooms = ClassRoom::where('teacher_id', $teacher_id)->first();
        $terms = Terms::where('owner_id', $teacher_owner)->pluck('terms')->first();

        return view('student.result', compact(
            'studentarm',
            'studentdays',
            'schooldays',
            'terms',
            'classSize',
            'classRooms',
            'date_of_resumption',
            'school_info',
            'student',
            'results',
            'studentBehavior',
            'studentSkills',
            'studentRemark',
            'teacher_info',
            'principal',
            'principalRemarks',
            'highestAverage',  // Pass highest average to the view
            'lowestAverage',    // Pass lowest average to the view
            'position',         // Pass student position to the view
            'student_total_score', // Pass total score obtained to the view
            'total_possible_score' // Pass total possible score to the view
        ));
    }

    // Helper functions for grading and remark logic
    private function calculateGrade($totalScore) {
        if ($totalScore >= 70) {
            return 'A';
        } elseif ($totalScore >= 60) {
            return 'B';
        } elseif ($totalScore >= 50) {
            return 'C';
        } elseif ($totalScore >= 40) {
            return 'D';
        } else {
            return 'F';
        }
    }

    private function determineRemark($totalScore) {
        if ($totalScore >= 70) {
            return 'Excellent';
        } elseif ($totalScore >= 60) {
            return 'Very Good';
        } elseif ($totalScore >= 50) {
            return 'Good';
        } elseif ($totalScore >= 40) {
            return 'Fair';
        } else {
            return 'Poor';
        }
    }

                    
                         
                                        
public function studentdays()
{
    // Fetch students associated with the current teacher
    $students = Student::where('teacher_id', Auth::id())->get(); // Assuming each student has a teacher_id field

    return view('teacher.studentdays', compact('students')); // Pass the students variable to the view
}
                                      


}



