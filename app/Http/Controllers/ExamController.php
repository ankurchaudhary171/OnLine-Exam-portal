<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Student;

class ExamController extends Controller
{


    public function create()
{
    $subjects = Subject::all();
    // $students = Student::all(); 
      $students = Student::where('role', 0)->get(); 
    return view('exam.add', compact('subjects','students'));
}


public function getQuestions($subject_id)
{
    $questions = Question::where('subject_id', $subject_id)->get();

    return response()->json($questions);
}

 public function getStudents()
    {
        return response()->json(Student::all());
    }

public function store(Request $request)
{

    $exam = new Exam();

    $exam->exam_title = $request->exam_title;
    $exam->subject_id = $request->subject_id;
  $exam->student_id = $request->student_id;
    
    $exam->selected_questions = implode(",", $request->selected_questions);

     
    // $exam->student_id = Auth::guard('students')->id();


    $exam->save();

    return back()->with('success', 'Exam Created Successfully!');
}




public function questionPaper()
{
    $studentId = Auth::guard('students')->id();
    // $studentId = Auth::guard('students')->user();

    $exam = Exam::where('student_id', $studentId)->first();

    if (!$exam) {
        return redirect('/userdash')->with('error', 'No exam assigned!');
    }

    $questions = Question::whereIn('id', explode(',', $exam->selected_questions))->get();

    return view('questionpaper', compact('exam', 'questions'));
}








public function submitExam(Request $request)
{
    $studentId = Auth::guard('students')->id();

    foreach ($request->answers as $questionId => $answerId) {

        $correctAnswer = DB::table('answers')
            ->where('question_id', $questionId)
            ->where('correct', 1)
            ->value('id');

        $isCorrect = ($answerId == $correctAnswer) ? 1 : 0;

        DB::table('results')->insert([
            'student_id'  => $studentId,
            'question_id' => $questionId,
            'answer_id'   => $answerId,
            'is_correct'  => $isCorrect,  
            'created_at'  => now()
        ]);
    }

   
    return redirect('/userdash')->with('success', 'Exam submitted successfully!');
}




    public function showresult()
{
    $studentId = Auth::guard('students')->id();

   
    $totalCorrect = DB::table('results')
        ->where('student_id', $studentId)
        ->where('is_correct', 1)
        ->count();

    return view('userdash', compact('totalCorrect'));
}



public function examList()
{
    $exams = Exam::with('student', 'subject')->get();
    return view('exam.list', compact('exams'));
}


public function examQuestions($id)
{
    $exam = Exam::findOrFail($id);

    $questions = Question::whereIn('id', explode(",", $exam->selected_questions))->get();

    return view('exam.questions', compact('exam', 'questions'));
}


public function deleteExamQuestion($examId, $questionId)
{
    $exam = Exam::findOrFail($examId);

    $selected = explode(",", $exam->selected_questions);

    // Remove question
    $updated = array_diff($selected, [$questionId]);

    $exam->selected_questions = implode(",", $updated);
    $exam->save();

    return back()->with('success', 'Question removed from exam!');
}

public function result()
{
    $studentId = Auth::guard('students')->id();

   
    $attempted = DB::table('results')
        ->where('student_id', $studentId)
        ->count();

    
    $correct = DB::table('results')
        ->where('student_id', $studentId)
        ->where('is_correct', 1)
        ->count();

    
    $wrong = $attempted - $correct;

    
   if ($attempted > 0) {
    $percentage = ($correct / $attempted) * 100;
} else {
    $percentage = 0;
}

if ($percentage >= 40) {
    $status = "PASS";
} else {
    $status = "FAIL";
}


    return view('result', compact('attempted', 'correct', 'wrong', 'percentage', 'status'));
}








// public function questionPaper()
// {
//     $studentId = Auth::guard('students')->id();

//     // Prevent access if already attempted
//     $attempted = DB::table('results')
//                     ->where('student_id', $studentId)
//                     ->exists();

//     if ($attempted) {
//         return redirect('/userdash')->with('error', 'You have already attempted the exam!');
//     }

//     $exam = Exam::where('student_id', $studentId)->first();

//     if (!$exam) {
//         return redirect('/userdash')->with('error', 'No exam assigned!');
//     }

//     $questions = Question::whereIn('id', explode(',', $exam->selected_questions))->get();

//     return view('questionpaper', compact('exam', 'questions'));
// }



}



