<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Academic Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Custom CSS to make table borders black */
        table.table-bordered {
            border: 2px solid black;
        }
        table.table-bordered th, 
        table.table-bordered td {
            border: 1px solid black;
        }
        .print-button {
            margin: 20px 0;
        }
        .logo-container {
            padding-right: 50px; /* Add space between the logo and the text */
        }

        .rounded-logo {
            width: 200px; /* Adjust the size of the logo as needed */
            height: auto;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div style="display: flex; align-items: center; justify-content: space-between; overflow: auto;">
        <!-- Left-aligned logo -->
        <div id="schoollogo" class="logo-container" style="flex: 0 0 auto;">
            <img src="{{ $school_info->school_logo }}" alt="School Logo" class="rounded-logo">
        </div>

        <!-- Centered school information -->
        <div id="two" class="text-center" style="flex: 1; text-align: center;">
            @if ($school_info)
                <h1>{{ $school_info->school_name }}</h1>
                <p><strong>Motto: {{ $school_info->school_motto }}</strong></p>
                <p>{{ $school_info->school_address }}</p>
                <p>Email: {{ $school_info->school_email }}</p>
                <h3>TERMLY ACADEMIC REPORT</h3>
                <p>KEYS TO RATING: 5 = EXCELLENT; 4 = GOOD; 3 = AVERAGE; 2 = BELOW AVERAGE; 1 = VERY POOR</p>
                <p>Result Software by LeoSoft: 08135836125, joshuadeinne@gmail.com</p>
            @else
                <p>No school information available.</p>
            @endif
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="float-start">
                @if ($student)
                    <h5>NAMES: {{ $student->name }}</h5>
                    <p>SESSION: 2023/2024</p>
                    <p>STUDENT ID: {{ $student->id }}</p>
                    <p>CLASS: {{ $student->class }} {{ $studentarm->arm }}</p>
                    <p>GENDER: {{ $student->gender }}</p> 
                    <p>ATTENDANCE: {{ $studentdays }}</p> 
                @else
                    <p>No student information available.</p>
                @endif
            </div>
            <div class="float-end text-start">
                <p>TERM: {{ $terms }}</p>
                <p>POSITION: 3rd</p>
                <p>CLASS SIZE: {{ $classSize }}</p>
                <p>HIGHEST CLASS AVERAGE: {{ number_format($highestAverage, 2) }}</p>
                <p>LOWEST CLASS AVERAGE: {{ number_format($lowestAverage, 2) }}</p>
                <p>DAYS SCHOOL OPENED: {{ $schooldays }}</p>  
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <h5>Academic Results</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>SUBJECT</th>
                        <th>1st TEST (10%)</th>
                        <th>2nd TEST (30%)</th>
                        <th>EXAM (60%)</th>
                        <th>TOTAL (100%)</th>
                        <th>SUBJECT AVERAGE</th>
                        <th>GRADE</th>
                        <th>REMARK</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $index => $result)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $result['subject_name'] }}</td>
                            <td>{{ $result['first_test'] }}</td>
                            <td>{{ $result['second_test'] }}</td>
                            <td>{{ $result['exam'] }}</td>
                            <td>{{ $result['total'] }}</td>
                            <td>{{ $result['average'] }}</td>
                            <td>{{ $result['grade'] }}</td>
                            <td>{{ $result['remark'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-12">
        <h5>Behavior Assessment</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Punctuality</th>
                        <th>Assignment Submission</th>
                        <th>Sense of Responsibility</th>
                        <th>Neatness</th>
                        <th>Cooperation</th>
                        <th>Participation</th>
                        <th>Respectfulness</th>
                        <th>Overall Behavior</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $studentBehavior ? $studentBehavior->punctuality : 'N/A' }}</td>
                        <td>{{ $studentBehavior ? $studentBehavior->assignment_submission : 'N/A' }}</td>
                        <td>{{ $studentBehavior ? $studentBehavior->sense_of_responsibility : 'N/A' }}</td>
                        <td>{{ $studentBehavior ? $studentBehavior->neatness : 'N/A' }}</td>
                        <td>{{ $studentBehavior ? $studentBehavior->cooperation : 'N/A' }}</td>
                        <td>{{ $studentBehavior ? $studentBehavior->participation : 'N/A' }}</td>
                        <td>{{ $studentBehavior ? $studentBehavior->respectfulness : 'N/A' }}</td>
                        <td>{{ $studentBehavior ? $studentBehavior->overall_behavior : 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="col-md-12">
        <h5>Skills Assessment</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Handwriting</th>
                        <th>Fluency</th>
                        <th>Sports</th>
                        <th>Craft</th>
                        <th>Drawing</th>
                        <th>Music</th>
                        <th>Home Management</th>
                        <th>Swimming</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $studentSkills ? $studentSkills->handwriting : 'N/A' }}</td>
                        <td>{{ $studentSkills ? $studentSkills->fluency : 'N/A' }}</td>
                        <td>{{ $studentSkills ? $studentSkills->sports : 'N/A' }}</td>
                        <td>{{ $studentSkills ? $studentSkills->craft : 'N/A' }}</td>
                        <td>{{ $studentSkills ? $studentSkills->drawing : 'N/A' }}</td>
                        <td>{{ $studentSkills ? $studentSkills->music : 'N/A' }}</td>
                        <td>{{ $studentSkills ? $studentSkills->home_management : 'N/A' }}</td>
                        <td>{{ $studentSkills ? $studentSkills->swimming : 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="col-md-12 d-flex justify-content-between">
        <div class="col-md-6 text-start">
            <h5>Teacher Remark</h5>
            <p>{{ $studentRemark ? $studentRemark->remark : 'No remark available.' }}</p>
        </div>
        <div class="col-md-6 text-end">
            <h5>Principal Remarks</h5>
            <p>{{ $principalRemarks ? $principalRemarks->remark : 'No principal remarks available.' }}</p>
        </div>
    </div>

    <!-- Box for Student Results -->
    <div class="col-md-12 mt-4 p-3 border rounded bg-light">
        <h5>Student Results Summary</h5>
        <p><strong>TOTAL SCORE OBTAINED:</strong> {{ $studentTotalScore }}</p>
        <p><strong>AVERAGE SCORE:</strong> {{ number_format($studentAverageScore, 2) }}</p>
        <p><strong>CLASS POSITION:</strong> {{ $studentPosition }}</p>
        <p><strong>RESULT:</strong> {{ $studentResult }}</p>
    </div>

    <div class="col-md-12">
        <button class="btn btn-primary print-button" onclick="window.print()">Print Report</button>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>
</html>
