@extends('User.Layouts.Master')

@section('content')
<body class="flex flex-col min-h-screen">

    

    <!-- Main Content -->
    <main class="flex-1 pt-20">
        <section class="bg-blue-600 text-white text-center p-5">
            <h2 class="text-2xl">Halo, ada yang bisa kami bantu?</h2>
        </section>
        
        <section class="text-center py-8">
            <h3 class="text-xl mb-5 text-gray-700">Kategori</h3>
            <div class="grid grid-cols-4 gap-4">
                <div class="border-2 border-gray-300 rounded-lg p-4 font-bold text-gray-700 flex justify-center items-center">
                    <a href="{{ route('kategori.show', 'Belanja') }}">Belanja</a>
                </div>
                <div class="border-2 border-gray-300 rounded-lg p-4 font-bold text-gray-700 flex justify-center items-center">
                    <a href="{{ route('kategori.show', 'Penawaran & hadiah') }}">Penawaran & hadiah</a>
                </div>
                <div class="border-2 border-gray-300 rounded-lg p-4 font-bold text-gray-700 flex justify-center items-center">
                    <a href="{{ route('kategori.show', 'Pembayaran') }}">Pembayaran</a>
                </div>
                <div class="border-2 border-gray-300 rounded-lg p-4 font-bold text-gray-700 flex justify-center items-center">
                    <a href="{{ route('kategori.show', 'Pesanan & Pengiriman') }}">Pesanan & pengiriman</a>
                </div>
                <div class="border-2 border-gray-300 rounded-lg p-4 font-bold text-gray-700 flex justify-center items-center">
                    <a href="{{ route('kategori.show', 'Pengembalian Barang & Dana') }}">Pengembalian barang & dana</a>
                </div>
                <div class="border-2 border-gray-300 rounded-lg p-4 font-bold text-gray-700 flex justify-center items-center">
                    <a href="{{ route('kategori.show', 'Informasi Umum') }}">Informasi umum</a>
                </div>
                <div class="border-2 border-gray-300 rounded-lg p-4 font-bold text-gray-700 flex justify-center items-center">
                    <a href="{{ route('kategori.show', 'Mitra') }}">Mitra</a>
                </div>
                <div class="border-2 border-gray-300 rounded-lg p-4 font-bold text-gray-700 flex justify-center items-center">
                    <a href="{{ route('kategori.show', 'Akun') }}">Akun</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white p-5 flex justify-between flex-wrap text-center">
        <div class="flex-1 p-2">
            <h4 class="text-xl mb-2">About Us</h4>
            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="flex-1 p-2">
            <h4 class="text-xl mb-2">Customer Service</h4>
            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="flex-1 p-2">
            <h4 class="text-xl mb-2">Contact Us</h4>
            <p class="text-sm">0822 8667 9166<br>go.buy@gmail.com</p>
        </div>
        <div class="flex-1 p-2">
            <h4 class="text-xl mb-2">Newsletter</h4>
            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </footer>

</body>
</html>
@endsection