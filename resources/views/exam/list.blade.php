{{-- @extends('layout') --}}
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>All Exams</h3>
        <table class="table table-bordered">
            <tr>
                <th>Exam Title</th>
                <th>Student</th>
                <th>Subject</th>
                <th>Action</th>
            </tr>

            @foreach ($exams as $exam)
                <tr>
                    <td>{{ $exam->exam_title }}</td>
                    <td>{{ $exam->student->name }}</td>
                    <td>{{ $exam->subject->subject }}</td>
                    <td>
                        <a href="{{ route('exam.questions', $exam->id) }}" class="btn btn-info btn-sm">View Questions</a>
                    </td>
                    {{-- <div><a href="{{ url('result') }}">Result</a></div> --}}
                    <td>
                        {{-- <a href="{{ url('result', $exam->id) }}" class="btn btn-info btn-sm">Result</a> --}}
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
