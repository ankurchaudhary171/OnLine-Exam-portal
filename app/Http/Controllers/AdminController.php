<?php

namespace App\Http\Controllers;
use App\Models\Exam;

use Illuminate\Http\Request;


use App\Models\Subject;

use App\Models\Question;

class AdminController extends Controller
{
 
    public function show()
    {
        return view('subject.add');
    }

   
    public function insertdata(Request $request)
    {

        Subject::create([
            'subject' => $request->subject
        ]);

        return back()->with('success', 'Subject Added Successfully!');
    }

   
    public function list()
    {
        $subjects = Subject::all();
        return view('subject.list', compact('subjects'));
    }

    
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.edit', compact('subject'));
    }

    public function updatedata(Request $request, $id)
    {
       
        $subject = Subject::findOrFail($id);

        $subject->update([
            'subject' => $request->subject
        ]);

        return redirect()->route('subject.list')->with('success', 'Subject Updated Successfully!');
    }

  
    public function delete($id)
    {
        Subject::findOrFail($id)->delete();

        return back()->with('success', 'Subject Deleted Successfully!');
    }

    public function create()
{
    $subjects = Subject::all();
    return view('exam.add', compact('subjects'));
}


}



