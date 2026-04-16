<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show()
    {

        return view('student');
    }

    public function insert(Request $request)
    {

        $students = new Student();

        $students->name = $request->name;
        $students->email = $request->email;
        $students->password = Hash::make($request->password);
        $students->save();

        return redirect()->route('login');
    }

    public function showlogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::guard('students')->attempt($credentials)) {
            $user = Auth::guard('students')->user();

            if ($user->role == 1) {
                return redirect('admindash');
            } else {
                return redirect('userdash');
            }
        } else {
            return view('login');
        }
    }
    
    public function userdash()
    {
        return view('userdash');
    }

    public function admindash()
    {
        return view('admindash');
    }


    public function logout()
    {
        Auth::guard('students')->logout();
        return redirect()->route('login');
    }



    

}
