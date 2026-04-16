{{-- @extends('layout') --}}

{{-- 
@extends('layouts.app')


@section('content')

<div class="container mt-4">

    <h3>Edit Question</h3>

    <form action="{{ route('question.update', $question->id) }}" method="POST">
        @csrf

        <label class="form-label">Question</label>
        <input type="text" name="question" class="form-control" value="{{ $question->question }}">

        <button class="btn btn-primary mt-3">Update</button>
    </form>

</div>

@endsection --}}
