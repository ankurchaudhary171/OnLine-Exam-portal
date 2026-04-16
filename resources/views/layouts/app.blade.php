<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Online Exam' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

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

</body>
</html>
