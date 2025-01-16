@extends('User.Layouts.Master')

@section('title', 'Bayar')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
@section('header')
@endsection
{{-- @dd($params) --}}
@section('content')
    <div class="w-full h-screen flex justify-center items-center">
        <div class="max-w-sm p-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 8H5m12 0a1 1 0 0 1 1 1v2.6M17 8l-4-4M5 8a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.6M5 8l4-4 4 4m6 4h-4a2 2 0 1 0 0 4h4a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1Z" />
            </svg>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Total Bayar</h5>
            <h5 class="mb-0 text-xl font-bold text-gray-700 dark:text-gray-400">
                Rp. {{ number_format($transaksi->total, 0, ',', '.') }}</h5>
            <p class="mb-3 text-xs text-gray-500 dark:text-gray-400">
                Order ID #{{ $transaksi->transaksi_id }}
            </p>
            <p class="mb text-lg font-medium text-gray-700 dark:text-gray-400">
                Selesaikan Pembayaran Sebelum</p>
            <div
                class="mb-3 border-2 border-blue-300 flex w-fit p-2 border-dashed text-sm font-bold text-gray-700 dark:text-gray-400">
                {{ $expired }}</div>

            <p class="mb-3 text-lg font-medium text-gray-700 dark:text-gray-400">

                <button type="button" id="bayar-sekarang"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Bayar Sekarang
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>

                </button>
        </div>
    </div>
    {{-- jqeury --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('bayar-sekarang').onclick = function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    $.ajax({
                        url: "/checkout/pay/success",

                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            snapToken: '{{ $snapToken }}',
                        },
                        type: "post",
                        success: function(response) {
                            if (response.success == false) {
                                Swal.fire({
                                    title: "Pembayaran Gagal",
                                    icon: "error",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "{{ route('home') }}";
                                    }
                                });
                                return;
                            } else {
                                Swal.fire({
                                    title: "Pembayaran Berhasil",
                                    icon: "success",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "{{ route('home') }}";
                                    }
                                });
                            };

                        }
                    });

                },
                onPending: function(result) {
                    // close aja tanpa redirect
                    snap.hide();
                },
                onError: function(result) {
                    // Redirect atau tampilkan pesan error
                    snap.hide();
                    swal("Oops!", "Terjadi kesalahan saat melakukan pembayaran", "error");
                },
                onClose: function() {
                    // close aja tanpa redirect
                    snap.hide();
                }
            });
        }
    </script>
@endsection

@section('footer')
@endsection
