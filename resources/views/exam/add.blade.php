
{{-- @extends('layouts.app') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="#">Welcome Admin</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admindash') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subject.add') }}">Add Subject</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('exam.create') }}">Exam</a>
                    </li>

                    <li class="nav-item">
    <a class="nav-link" href="{{ route('exam.list') }}">Exam List</a>
</li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Exam</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body class="bg-light">

        <div class="container mt-5">

            <div class="card shadow p-4">
                <h3>Create Exam</h3>
                <hr>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif


                <form action="{{ route('exam.store') }}" method="POST">
                    @csrf

                    <!-- Exam Title -->
                    <label class="form-label">Exam Title (Paper Name)</label>
                    <input type="text" name="exam_title" class="form-control mb-3" placeholder="Enter Exam Title"
                        required>

                    <!-- Student Dropdown -->
                    <label class="form-label">Choose Student</label>
                    <select name="student_id" class="form-select mb-3" required>
                        <option value="">Select Student</option>
                        @foreach ($students as $stu)
                            <option value="{{ $stu->id }}">{{ $stu->name }}</option>
                        @endforeach
                    </select>
                    <br>

                    <label class="form-label">Choose Subject</label>
                    <select id="subjectDropdown" name="subject_id" class="form-select mb-3" required>
                        <option value="">Select Subject</option>

                        @foreach ($subjects as $sub)
                            <option value="{{ $sub->id }}">{{ $sub->subject }}</option>
                        @endforeach
                    </select>


                    <div id="questionBox"></div>


                    <button type="submit" class="btn btn-primary mt-3">Save Exam</button>

                </form>


            </div>

        </div>


        <script>
            $("#subjectDropdown").change(function() {

                let subject_id = $(this).val();
                $("#questionBox").html("");


                $.ajax({
                    url: "/get-questions/" + subject_id,
                    method: "GET",
                    success: function(data) {

                        let html = "<h5 class='mt-3'>Select Questions:</h5>";
                        if (data.length === 0) {
                            html += `
                    <div class="alert alert-warning mt-2">
                        No questions available for this subject.
                    </div>
                `;
                        }
                        data.forEach(function(q) {
                            html += `
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" 
                                   name="selected_questions[]" value="${q.id}">
                            <label class="form-check-label">${q.question}</label>
                        </div>
                    `;
                        });

                        $("#questionBox").html(html);

                    }
                });
            });
        </script>

    </body>

    </html>
