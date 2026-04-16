<!DOCTYPE html>
<html>
<head>
    <title>Question Paper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <h2 class="mb-4">Question Paper</h2>

    <form action="{{ route('submit.exam') }}" method="POST">
        @csrf

        @foreach ($questions as $q)
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5>{{ $loop->iteration }}. {{ $q->question }}</h5>

                    @foreach ($q->answers as $ans)
                        <div class="form-check">
                            <input class="form-check-input" type="radio"name="answers[{{ $q->id }}]"value="{{ $ans->id }}" required>

                            <label class="form-check-label">
                                {{ $ans->answer }}
                            </label>
                        </div>
                    @endforeach

                </div>
            </div>
        @endforeach

        <button class="btn btn-success">Submit Exam</button>
    </form>

</div>

</body>
</html>
