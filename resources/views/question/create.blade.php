
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Online Exam' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5">
<div class="card shadow-lg p-4 border-0" style="border-radius: 10px; background:white;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container mb-4">

            <a class="navbar-brand" href="#">Online Exam</a>

            <div class="d-flex">
                <a href="/admindash" class="btn btn-light btn-sm me-2">Dashboard</a>
                <a href="{{ route('subject.add') }}" class="btn btn-warning btn-sm me-2">Add Subject</a>
                {{-- <a href="{{ route('exam.create') }}" class="btn btn-primary btn-sm me-2">Create Exam</a> --}}
                <a href="{{ route('exam.list') }}" class="btn btn-info btn-sm me-2">Exam List</a>
                <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
            </div>

        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</div>
</body>
</html>











<!DOCTYPE html>
<html>

<head>
    <title>Add Question</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
{{-- @extends('layouts.app') --}}
<body class="p-4">

    <h2>Add Question</h2>

    <form id="questionForm">

       
        <label class="mt-2">Question:</label>
        <input type="text" name="question" id="question" class="form-control mb-3">

        
        <label>Select Subject:</label>
        <select name="subject_id" id="subject_id" class="form-control mb-3">
            <option value="">Choose Subject</option>

            @foreach ($subjects as $sub)
                <option value="{{ $sub->id }}">{{ $sub->subject }}</option>
            @endforeach

        </select>

        
        <div id="answersArea">
            <div class="d-flex mb-2 answerRow">
                <input type="checkbox" class="form-check-input correctBox me-2">

                <input type="text" class="form-control answerInput me-2" placeholder="Answer">

                <button type="button" class="btn btn-danger removeBtn">Remove</button>
            </div>
        </div>

      
      <button type="button" id="addAnswer" class="btn btn-success mt-3 mb-4"> + Add Answer</button><br><br>

        <button type="submit" class="btn btn-primary">Submit Question</button>

    </form>


<script>
$(document).ready(function () {

    
    $("#addAnswer").click(function () {

        var html = '<div class="d-flex mb-2 answerRow">' +
            '<input type="checkbox" class="correctBox me-2">' +
            '<input type="text" class="form-control answerInput me-2" placeholder="Answer">' +
            '<button type="button" class="btn btn-danger removeBtn">Remove</button>' +
            '</div>';

        $("#answersArea").append(html);
    });


    
    $(document).on("click", ".removeBtn", function () {
        $(this).parent().remove();
    });


  
    $("#questionForm").submit(function (e) {
        e.preventDefault();

        var question = $("#question").val();
        var subject_id = $("#subject_id").val();

        var answers = [];
        var correct = [];

        $(".answerRow").each(function () {

            var ans = $(this).find(".answerInput").val();
            var isCorrect = $(this).find(".correctBox").is(":checked") ? 1 : 0;

            if (ans != "") {
                answers.push(ans);
                correct.push(isCorrect);
            }
        });


        $.ajax({
            url: "{{ route('question.store') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                question: question,
                subject_id: subject_id,
                answers: answers,
                correct: correct
            },

            success: function (response) {
                alert("Question Added Successfully!");
                location.reload();
            }
        });

    });

});

</script>

</body>
</html>



