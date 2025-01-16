<!-- resources/views/jawaban-pertanyaan.blade.php -->

@extends('User.Layouts.Master')

@section('content')
<!-- Header -->
<header class="header">
    <div class="logo">
        <img src="{{ asset('storage/Goobuy.jpg') }}" alt="Logo Goobuy">
        <h1>Goobuy | Layanan pelanggan</h1>
        <a href="/" class="home-link">Home</a> <!-- Tambahkan link Home -->
    </div>
</header>

<div class="container">
    <h1 class="mb-4 text-center">Jawaban Kategori: {{ $kategori }}</h1>

    <!-- Section untuk Daftar Pertanyaan dan Jawaban -->
    <section>
        <div class="list-group">
            @foreach($pertanyaan as $index => $p)
                <a href="#" class="list-group-item list-group-item-action">
                    <strong>Pertanyaan:</strong> {{ $p }}<br>
                    <strong>Jawaban:</strong> {{ $jawaban[$index] }}
                </a>
            @endforeach
        </div>
    </section>

    <!-- Tombol Kembali -->
    <div class="mt-4 text-center">
        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="footer-section">
        <h4>About Us</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="footer-section">
        <h4>Customer Service</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    <div class="footer-section">
        <h4>Contact Us</h4>
        <p>0822 8667 9166<br>go.buy@gmail.com</p>
    </div>
    <div class="footer-section">
        <h4>Newsletter</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</footer>

@endsection