

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Pertanyaan - {{ $kategori }}</title>

    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .answer {
            display: none; /* Jawaban disembunyikan secara default */
            margin-top: 10px;
            padding: 10px;
            background-color: #f0f0f0;
            border-left: 3px solid #4CAF50;
        }
        .question {
            cursor: pointer;
            font-weight: bold;
            margin: 10px 0;
            color: #007BFF;
        }
        .question:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Container untuk konten -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Kategori Pertanyaan - {{ $kategori }}</h1>
        
        @foreach ($pertanyaan as $index => $question)
            <div class="question" onclick="toggleAnswer({{ $index }})">
                {{ $question }}
            </div>
            <div class="answer" id="answer-{{ $index }}">
                {{ $jawaban[$index] }}
            </div>
        @endforeach
    </div>

    <!-- Script JavaScript untuk Bootstrap (Optional, jika perlu) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        function toggleAnswer(index) {
            var answerElement = document.getElementById('answer-' + index);
            // Toggle display jawaban
            if (answerElement.style.display === 'none' || answerElement.style.display === '') {
                answerElement.style.display = 'block';
            } else {
                answerElement.style.display = 'none';
            }
        }
    </script>
     <!-- Tombol Kembali -->
    <div class="mt-4 text-center">
        <a href="{{ route('layanan') }}" class="btn btn-primary">Kembali ke Layanan Pelanggan</a>
    </div>
</body>
</html>