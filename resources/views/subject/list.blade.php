<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Subjects</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="#">Welcome Admin</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                 <li class="nav-item">
                    <a class="nav-link" href="{{ url('admindash')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subject.add') }}">Add Subject</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('exam.create') }}">Exam</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
                </li>

            </ul>

        </div>

    </div>
</nav>


<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="text-center mb-4">All Subjects</h2>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- TABLE -->
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->subject }}</td>
                    <td>
                        <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('subject.delete', $subject->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- ADD NEW SUBJECT BUTTON -->
        <div class="text-center mt-3">
            <a href="{{ route('subject.add') }}" class="btn btn-success">
                Add New Subject
            </a>
        </div>

    </div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
