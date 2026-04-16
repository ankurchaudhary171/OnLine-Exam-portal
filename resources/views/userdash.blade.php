<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3f4f6;
        }

        .card {
            border-radius: 12px;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .dashboard-title {
            font-weight: 700;
            letter-spacing: .5px;
        }
    </style>

</head>

<body>

    <!-- 🌐 NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                User Dashboard
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('questionpaper') }}">Question Paper</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('result') }}">Result</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-danger btn-sm ms-2" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container py-4">

        <!-- Welcome Card -->
        <div class="card shadow-sm mb-4 mt-3">
            <div class="card-body">
                <h4 class="section-title mb-3">Welcome</h4>

                <p class="mb-0">
                    @if (Auth::guard('students')->check())
                        <strong>Name:</strong> {{ Auth::guard('students')->user()->name }}
                    @endif
                </p>
            </div>
        </div>

        <!-- Exam Card -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4 class="section-title mb-3">Your Exam</h4>

                <div class="mb-3">
                    <a href="{{ url('questionpaper') }}" class="btn btn-primary btn-sm">Go To Question Paper</a> 
                  
                </div>

                <div>
                    <a href="{{ url('result') }}" class="btn btn-success btn-sm">View Result</a>
                </div>
            </div>
        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    {{-- @if (!$attempted)
    <   <a href="{{ url('questionpaper') }}" class="btn btn-primary btn-sm">Go To Question Paper</a>
@else
    <button class="btn btn-secondary" disabled>Exam Already Attempted</button>
@endif --}}



</body>

</html>
