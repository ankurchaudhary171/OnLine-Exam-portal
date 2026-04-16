<!DOCTYPE html>
<html>
<head>
    <title>Your Exam Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <h2 class="mb-4">Exam Result</h2>

    <div class="card shadow-sm p-4">

        <h4>Performance Summary</h4>
        <hr>
        {{-- <p><strong>Name:</strong> {{ $studentId->name }}</p> --}}
        {{-- <p><strong>Name:</strong> {{ $studentId->subject->subject_id }}</p> --}}

        <p><strong>Total Attempted:</strong> {{ $attempted }}</p>
        <p><strong>Correct Answers:</strong> {{ $correct }}</p>
        <p><strong>Wrong Answers:</strong> {{ $wrong }}</p>
        <p><strong>Percentage:</strong> {{ number_format($percentage, 2) }}%</p>

        <h4 class="mt-3">
            Result: 
            @if($status == 'PASS')
                <span class="text-success fw-bold">PASS</span>
            @else
                <span class="text-danger fw-bold">FAIL</span>
            @endif
        </h4>

        <a href="/userdash" class="btn btn-primary mt-3">Back to Dashboard</a>

    </div>

</div>

</body>
</html>
