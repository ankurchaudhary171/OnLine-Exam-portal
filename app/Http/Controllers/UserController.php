<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Exam;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Student;

class UserController extends Controller
{


    public function userdata()
    {
        $studentId = Auth::guard('students')->id();

     
        $subjects  = Subject::all();
        $students  = Student::all();
        $questions = Question::with('subject')->get(); 

      
        $exam = Exam::where('student_id', $studentId)->first();

       if ($exam) {

   
    $qIds = explode(',', $exam->selected_questions);

   
    $qIds = array_map('intval', $qIds);

    
    $selectedQuestions = Question::whereIn('id', $qIds)->get();

} else {

    
    $selectedQuestions = collect();
}


        return view('userdash', compact(
            'subjects',
            'students',
            'questions',
            'exam',
            'selectedQuestions'
        ));
    }


     public function questionpaper()
    {
        $studentId = Auth::guard('students')->id();

      
        $subjects  = Subject::all();
        $students  = Student::all();
        $questions = Question::with('subject')->get(); 

      
        $exam = Exam::where('student_id', $studentId)->first();

    if ($exam && $exam->selected_questions) {

    
    $qIds = explode(',', $exam->selected_questions);

    
    $qIds = array_filter($qIds);


    $selectedQuestions = Question::whereIn('id', $qIds)->get();

} else {

  
    $selectedQuestions = collect();
}

        return view('questionpaper', compact(
            'subjects',
            'students',
            'questions',
            'exam',
            'selectedQuestions'
        ));
    }
    
    public function showquestion(){
        return view('questionpaper');
    }


public function userDashboard()
{
    $studentId = Auth::guard('students')->id();

    // Check if student has attempted exam
    $attempted = DB::table('results')
                    ->where('student_id', $studentId)
                    ->exists();

    return view('userdash', compact('attempted'));
}



// public function userDashboard()
// {
//     $studentId = Auth::guard('students')->id();

//     // Check if student has attempted exam
//     $attempted = DB::table('results')
//                     ->where('student_id', $studentId)
//                     ->exists();

//     // Get exam for this student
//     $exam = Exam::where('student_id', $studentId)->first();

//     return view('userdash', compact('exam', 'attempted'));
// }



}
