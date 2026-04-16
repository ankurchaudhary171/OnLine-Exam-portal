<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Student;
use App\Models\Subject;

class QuestionController extends Controller
{
    public function create(){
        $subjects = Subject::all();
        return view('question.create', compact('subjects'));
    }

    public function store(Request $request){

        
        $question = Question::create([
            'question' => $request->question,
            'subject_id' => $request->subject_id
        ]);

       
        foreach ($request->answers as $index => $ans) {
            Answer::create([
                'question_id' => $question->id,
                'answer' => $ans,
                'correct' => $request->correct[$index]
            ]);
        }

        return response()->json(['message' => 'Inserted Successfully']);
    }


      public function getQuestions($subject_id)
    {
        return Question::where('subject_id', $subject_id)->get();
    }



}
