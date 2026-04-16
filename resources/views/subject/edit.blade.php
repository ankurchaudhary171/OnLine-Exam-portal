<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Subject</title>

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

        <h2 class="text-center mb-4">Edit Subject</h2>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('subject.update', $subject->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Subject Name</label>
                <input 
                    type="text" 
                    name="subject" 
                    value="{{ $subject->subject }}" 
                    class="form-control"
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Subject</button>
        </form>

    </div>
</div>


<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
