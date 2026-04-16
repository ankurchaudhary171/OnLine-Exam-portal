@extends('layouts.app')

@section('content')

<h3>Exam: {{ $exam->exam_title }}</h3>
<h5>Subject: {{ $exam->subject->subject }}</h5>

<div class="card p-3 mt-3">
    <h4>Questions</h4>

    @if(count($questions) == 0)
        <div class="alert alert-warning">No questions found in this exam.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($questions as $q)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $q->question }}</td>
                    <td>
                        <a href="{{ route('exam.question.delete', ['examId' => $exam->id, 'questionId' => $q->id]) }}" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Delete this question?')">
                           Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('exam.list') }}" class="btn btn-secondary mt-3">Back</a>
</div>

@endsection
