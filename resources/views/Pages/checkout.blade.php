@extends('User.Layouts.Master')
@section('title', 'Checkout')
@section('content')
    <section class="w-full pt-20 ">
        <!-- breadcrumb -->
        <div class="container py-4 flex items-center gap-3 ps-6 lg:ps-20 dark:bg-gray-700">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-dark-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('post-product') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-dark-600 dark:text-gray-400 dark:hover:text-white">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            Postingan
                        </div>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('post-product-detail', $product->id) }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-dark-600 dark:text-gray-400 dark:hover:text-white">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            Postingan product detail
                        </div>
                    </a>
                </li> --}}
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Checkout</span>
                    </div>
                </li>
            </ol>
        </div>
        <!-- ./breadcrumb -->

        <div class="container px-6 mx-auto mt-6 mb-20 flex justify-center ">
            <div class="flex flex-col w-full lg:w-5/6 md:flex-row justify-between md:gap-4">
                <div class=" md:w-3/6 lg:w-2/3">
                    <div class="flex flex-col gap-4">
                        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
                            <div
                                class="flex items
                                -center justify-between px-6 py-4 border-b dark:border-gray-700">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Detail Pesanan</h3>
                            </div>
                            {{-- @dd($pesanan) --}}
                            <div id="pesanan" class="px-6 py-4">
                                @foreach ($pesanan as $pesanan)
                                    <div class="flex flex-col items-start mb-3">
                                        <div class="flex flex-row mb-3">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M5.535 7.677c.313-.98.687-2.023.926-2.677H17.46c.253.63.646 1.64.977 2.61.166.487.312.953.416 1.347.11.42.148.675.148.779 0 .18-.032.355-.09.515-.06.161-.144.3-.243.412-.1.111-.21.192-.324.245a.809.809 0 0 1-.686 0 1.004 1.004 0 0 1-.324-.245c-.1-.112-.183-.25-.242-.412a1.473 1.473 0 0 1-.091-.515 1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.401 1.401 0 0 1 13 9.736a1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.4 1.4 0 0 1 9 9.74v-.008a1 1 0 0 0-2 .003v.008a1.504 1.504 0 0 1-.18.712 1.22 1.22 0 0 1-.146.209l-.007.007a1.01 1.01 0 0 1-.325.248.82.82 0 0 1-.316.08.973.973 0 0 1-.563-.256 1.224 1.224 0 0 1-.102-.103A1.518 1.518 0 0 1 5 9.724v-.006a2.543 2.543 0 0 1 .029-.207c.024-.132.06-.296.11-.49.098-.385.237-.85.395-1.344ZM4 12.112a3.521 3.521 0 0 1-1-2.376c0-.349.098-.8.202-1.208.112-.441.264-.95.428-1.46.327-1.024.715-2.104.958-2.767A1.985 1.985 0 0 1 6.456 3h11.01c.803 0 1.539.481 1.844 1.243.258.641.67 1.697 1.019 2.72a22.3 22.3 0 0 1 .457 1.487c.114.433.214.903.214 1.286 0 .412-.072.821-.214 1.207A3.288 3.288 0 0 1 20 12.16V19a2 2 0 0 1-2 2h-6a1 1 0 0 1-1-1v-4H8v4a1 1 0 0 1-1 1H6a2 2 0 0 1-2-2v-6.888ZM13 15a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div class="ms-1 font-medium">
                                                {{ $pesanan['merchant']->name }}
                                            </div>
                                            <input type="hidden" name="merchant[]" value="{{ $pesanan['merchant']->id }}"
                                                form="checkout-form">
                                        </div>
                                        <div class="flex items-start flex-col w-full">
                                            @foreach ($pesanan['products'] as $product)
                                                <div class="flex items-center justify-between w-full">
                                                    <div class="flex items-center w-3/4 gap-4 h-20">
                                                        <a href="{{ route('post-product-detail', $product->id) }}"
                                                            target="_blank"
                                                            class="flex items-center aspect-square w-20 h-20 shrink-0">
                                                            <img class="h-auto w-full max-h-full"
                                                                src="{{ $product->photo ?? 'https://placehold.co/600x400' }}" />
                                                        </a>
                                                        <a href="{{ route('post-product-detail', $product->id) }}"
                                                            class="hover:underline">{{ $product->name }}</a>
                                                    </div>
                                                    <div class="flex flex-col items-end w-1/4">
                                                        <div
                                                            class="flex items
                                                            -center justify-end">
                                                            <span
                                                                class="text-sm me-3 font font-semibold text-gray-700 dark:text-gray-200">
                                                                {{ $product->qty }}x</span> <span
                                                                class="text-sm font-semibold text-gray-700 dark:text-gray-200">Rp.
                                                                {{ number_format($product->price) }}</span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="product[]" value="{{ $product->id }}"
                                                    form="checkout-form">
                                                <input type="hidden" name="qty[]" value="{{ $product->qty }}"
                                                    form="checkout-form">
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
                            <div
                                class="flex items
                                -center justify-between px-6 py-4 border-b dark:border-gray-700">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Alamat Pengiriman
                                </h3>
                                <button data-modal-target="alamat-modal" data-modal-toggle="alamat-modal"
                                    class="text-sm font-semibold text-blue-600 dark:text-blue-400 hover:underline">Ubah</button>
                            </div>
                            <div style="background-image: repeating-linear-gradient(45deg,#6fa6d6,#6fa6d6 33px,transparent 0,transparent 41px,#f18d9b 0,#f18d9b 74px,transparent 0,transparent 82px)"
                                class="h-1">

                            </div>

                            <div class="px-6 py-4">
                                @if (empty($alamat) || count($alamat) == 0)
                                    <div class="flex items-center justify-center">
                                        <h5 class="text-sm font-semibold text-gray-700 dark:text-gray-200">Alamat belum
                                            diatur</h5>
                                        <input type="hidden" name="alamat_bool" value="0">
                                    </div>
                                @else
                                    <div class="flex items
                                -center gap-4">
                                        <div class="flex flex-col pe-4 border-e-2 border-dashed border-blue-700">
                                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Alamat
                                                Lengkap</span>
                                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Desa</span>
                                            <span
                                                class="text-sm font-semibold text-gray-700 dark:text-gray-200">Kecamatan</span>
                                            <span
                                                class="text-sm font-semibold text-gray-700 dark:text-gray-200">Kota</span>
                                            <span
                                                class="text-sm font-semibold text-gray-700 dark:text-gray-200">Provinsi</span>
                                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Kode
                                                Pos</span>
                                            {{-- @dd($alamat) --}}
                                        </div>
                                        <div class="flex flex-col ms-2">
                                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                                {{ $alamat[0]['alamat_lengkap'] }}</span>
                                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                                {{ $alamat[0]['kelurahan'] }}</span>
                                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                                {{ $alamat[0]['kecamatan'] }}</span>
                                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                                {{ $alamat[0]['kabupaten'] }}</span>
                                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                                {{ $alamat[0]['provinsi'] }}</span>
                                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                                {{ $alamat[0]['kode_pos'] }}</span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="alamat_bool" value="1">
                                @endif

                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
                            <form class="w-full" id="apply-voucher">
                                @csrf
                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8.891 15.107 15.11 8.89m-5.183-.52h.01m3.089 7.254h.01M14.08 3.902a2.849 2.849 0 0 0 2.176.902 2.845 2.845 0 0 1 2.94 2.94 2.849 2.849 0 0 0 .901 2.176 2.847 2.847 0 0 1 0 4.16 2.848 2.848 0 0 0-.901 2.175 2.843 2.843 0 0 1-2.94 2.94 2.848 2.848 0 0 0-2.176.902 2.847 2.847 0 0 1-4.16 0 2.85 2.85 0 0 0-2.176-.902 2.845 2.845 0 0 1-2.94-2.94 2.848 2.848 0 0 0-.901-2.176 2.848 2.848 0 0 1 0-4.16 2.849 2.849 0 0 0 .901-2.176 2.845 2.845 0 0 1 2.941-2.94 2.849 2.849 0 0 0 2.176-.901 2.847 2.847 0 0 1 4.159 0Z" />
                                        </svg>

                                    </div>
                                    <input type="search" id="voucher-code" name="voucher-code"
                                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukan Kode Voucher" required />
                                    <button type="submit"
                                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pakai</button>
                                </div>
                            </form>
                            <div id="voucher-selected"
                                class="px-6 py-4 hidden border-blue-600 border-2 border-dashed rounded-lg">

                            </div>

                        </div>

                        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg mb-4 md:mb-0">
                            <div
                                class="flex items
                                -center justify-between px-6 py-4 border-b dark:border-gray-700">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Pengiriman</h3>
                            </div>
                            <div class="px-6 py-4">
                                <div class="flex items
                                    -center justify-between">
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Kurir
                                        Toko</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Rp.
                                        0
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-3/6 lg:w-1/3">
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg sticky top-24">
                        <div class="px-6 py-4 border-b dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Pembayaran</h3>
                        </div>
                        <div class="px-6 py-4">
                            <div class="flex items
                                -center justify-between">
                                <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Total Harga</span>
                                <span id="price" class="text-sm font-semibold text-gray-700 dark:text-gray-200">Rp.
                                    {{ number_format($total) }}</span>
                            </div>

                            <div class="flex items
                                -center justify-between mt-2">
                                <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Discount</span>
                                <span id="discount-value"
                                    class="text-sm font-semibold text-gray-700 dark:text-gray-200">Rp.
                                    0</span>
                            </div>
                            <div class="flex items
                                -center justify-between mt-2">
                                <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Ongkos
                                    Kirim</span>
                                <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Rp. 0</span>
                            </div>
                            <div class="flex items
                                -center justify-between mt-2">
                                <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Total
                                    Pembayaran</span>
                                <span id="total-price" class="text-sm font-semibold text-gray-700 dark:text-gray-200">Rp.
                                    {{ number_format($total) }}</span>
                                <input id="totalPayment" type="hidden" name="total" value="{{ $total }}"
                                    form="checkout-form">
                            </div>
                            <form action="{{ route('checkout-bayar') }}" method="post" id="checkout-form">
                                @csrf
                                <button type="button" id="checkout-button"
                                    class="w-full py-2 mt-4 text-sm font-semibold text-white bg-blue-600 dark:bg-blue-500 rounded-lg hover:bg-blue-500 dark:hover:bg-blue-400">Bayar
                                    Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Tambahkan script Alpine.js -->


        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.2.2/cdn.min.js"
            integrity="sha512-oHv8w2mpVQjAwKXjzI+cKqdr1jmxPA1ELvOlE/pM2pUzMo9TKZ6nXhzMAmMcZ1T4sy5roJYZX6cNi7O2A00JDA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </section>


    <!-- Main modal -->
    <div id="alamat-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed lg:mt-0 top-20 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-screen-52 lg:max-w-screen-sm min-h-screen py-20">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mt-20">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Alamat Pengiriman
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="alamat-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" id="alamat-form">
                    @csrf
                    <div class="grid gap-2 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="alamat_lengkap"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Lengkap</label>
                            <input type="text" name="alamat_lengkap" id="alamat_lengkap"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukan Alamat Lengkap" required
                                value="@if (!empty($alamat) && count($alamat) > 0) {{ $alamat[0]['alamat_lengkap'] }} @endif">
                        </div>
                        <div class="col-span-2">
                            <label for="kelurahan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan</label>
                            <input type="text" name="kelurahan" id="kelurahan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Kelurahan"
                                value="@if (!empty($alamat) && count($alamat) > 0) {{ $alamat[0]['kelurahan'] }} @endif">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="kecamatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Kecamatan"
                                value="@if (!empty($alamat) && count($alamat) > 0) {{ $alamat[0]['kecamatan'] }} @endif">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="kabupaten"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten</label>
                            <input type="text" name="kabupaten" id="kabupaten"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Kabupaten"
                                value="@if (!empty($alamat) && count($alamat) > 0) {{ $alamat[0]['kabupaten'] }} @endif">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="provinsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                            <input type="text" name="provinsi" id="provinsi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Provinsi" required
                                value="@if (!empty($alamat) && count($alamat) > 0) {{ $alamat[0]['provinsi'] }} @endif">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="kode_post"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Post</label>
                            <input type="text" name="kode_post" id="kode_post"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan kode post" required
                                value="@if (!empty($alamat) && count($alamat) > 0) {{ $alamat[0]['kode_pos'] }} @endif">
                        </div>
                    </div>
                </form>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-4 md:p-5 border-t rounded-b dark:border-gray-600">
                    <button type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                        data-modal-toggle="alamat-modal">Batal</button>
                    <button type="button" id="save-alamat"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ms-2">Simpan</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Main modal -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#save-alamat').click(function() {
                $.ajax({
                    url: "{{ route('ubah-alamat') }}",
                    type: "POST",
                    data: $('#alamat-form').serialize(),
                    success: function(response) {
                        if (response.success === true) {
                            Swal.fire({
                                title: 'Alamat berhasil diubah',
                                icon: 'success',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            console.log(response);
                            Swal.fire({
                                title: 'Gagal mengubah alamat',
                                icon: 'error',
                            });
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            title: 'Terjadi kesalahan',
                            icon: 'error',
                        });
                    }
                });
            });
        });
        $(document).ready(function() {
            let initialPrice = $("#price")
                .text()
                .replace("Rp", "")
                .replace(".", "")
                .replace(",", "");
            let discount = 0;
            let shippingCost = 0;

            console.log(initialPrice);

            function formatToIDR(value) {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }).format(value);
            }

            function updateTotalPrice() {
                let price = parseInt(initialPrice);
                let discountPrice = price - (price * discount) / 100;
                let discountValue = formatToIDR(price - discountPrice);
                let totalPrice = (discountPrice + shippingCost).toFixed(0);
                let totalPriceFormated = formatToIDR(discountPrice + shippingCost);
                console.log(price, discountPrice, totalPriceFormated);
                $("#total-price").text(totalPriceFormated);
                $("#discount-value").text(discountValue);
                $('#totalPayment').val(totalPrice);
            }

            // Apply Voucher
            $("#apply-voucher").submit(function(e) {
                e.preventDefault();
                let code = $("#voucher-code").val();
                $.ajax({
                    url: "/voucher/" + code,
                    type: "post",
                    success: function(response) {
                        if (response.success == false) {
                            Swal.fire({
                                title: response.message,
                                icon: "error",
                            });
                            return;
                        }
                        Swal.fire({
                            title: response.message,
                            icon: "success",
                        });
                        discount = response.discount;
                        $("#apply-voucher").addClass("hidden");
                        $("#voucher-selected").removeClass("hidden");
                        $("#voucher-selected").html(`
                    <div class="flex items
                    -center justify-between">
                    <div class="flex gap-2">
                                                                <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8.891 15.107 15.11 8.89m-5.183-.52h.01m3.089 7.254h.01M14.08 3.902a2.849 2.849 0 0 0 2.176.902 2.845 2.845 0 0 1 2.94 2.94 2.849 2.849 0 0 0 .901 2.176 2.847 2.847 0 0 1 0 4.16 2.848 2.848 0 0 0-.901 2.175 2.843 2.843 0 0 1-2.94 2.94 2.848 2.848 0 0 0-2.176.902 2.847 2.847 0 0 1-4.16 0 2.85 2.85 0 0 0-2.176-.902 2.845 2.845 0 0 1-2.94-2.94 2.848 2.848 0 0 0-.901-2.176 2.848 2.848 0 0 1 0-4.16 2.849 2.849 0 0 0 .901-2.176 2.845 2.845 0 0 1 2.941-2.94 2.849 2.849 0 0 0 2.176-.901 2.847 2.847 0 0 1 4.159 0Z" />
                                </svg>
                        <h5 class="text-sm font-semibold text-gray-700 dark:text-gray-200">${response.code}</h5>
                    </div>
                        <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">-${response.discount}%</span>
                    </div>
                    <input type="hidden" name="voucher" value="${response.code}" form="checkout-form">
                `);
                        updateTotalPrice();
                    },
                    error: function(response) {
                        alert("Voucher tidak valid");
                        console.log(response);
                    },
                });
            });

            // Checkout
            $("#checkout-button").click(function() {
                let isValid = true;

                $('input[name="merchant[]"]').each(function() {
                    if ($(this).attr("form") !== "checkout-form") {
                        isValid = false;
                        Swal.fire({
                            title: "Checkout tidak valid",
                            icon: "error",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });

                $('input[name="product[]"]').each(function() {
                    if ($(this).attr("form") !== "checkout-form") {
                        isValid = false;
                        Swal.fire({
                            title: "Checkout tidak valid",
                            icon: "error",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });
                $('input[name="qty[]"]').each(function() {
                    if ($(this).attr("form") !== "checkout-form") {
                        isValid = false;
                        Swal.fire({
                            title: "Checkout tidak valid",
                            icon: "error",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });

                $('input[name="voucher"]').each(function() {
                    if ($(this).attr("form") !== "checkout-form") {
                        isValid = false;
                        Swal.fire({
                            title: "Checkout tidak valid",
                            icon: "error",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });

                $('input[name="alamat_bool"]').each(function() {
                    if ($(this).attr("value") === "0") {
                        isValid = false;
                        Swal.fire({
                            title: "Alamat tidak boleh kosong",
                            icon: "error",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });

                if (isValid) {
                    $("#checkout-form").submit();
                }
            });
        });
    </script>

@endsection
