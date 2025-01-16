@extends('Merchant.Layouts.Master')
@section('title', 'Dashboard Merchant')
@section('content')

    <section class="w-full min-h-screen p-4">
        <div class="mt-14 rounded-lg p-0 lg:p-4">
            <div class="max-w-4xl mx-auto p-5 rounded-lg bg-white dark:bg-gray-700 ">
                <h2 class="text-2xl font-semibold mb-4 pl-2">Informasi Produk</h2>
                <form action="{{ route('merchant.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Foto Produk</label>
                        <div class="flex ml-4 lg:ml-[16rem] space-x-4">
                            <!-- Frame Foto 1 -->
                            <div
                                class="h-20 w-20 border-dashed border-2 border-zinc-300 dark:border-zinc-600 rounded-lg text-center relative">
                                <input type="file" name="photo" class="hidden" id="product-photo-1" accept="image/*"
                                    onchange="previewImage(1)">
                                <button type="button" onclick="document.getElementById('product-photo-1').click()"
                                    class="text-red-600 text-xs mt-5">Tambahkan Foto 1</button>
                                <img id="image-preview-1" src="" alt="Pratinjau Gambar 1"
                                    class="absolute top-0 left-0 w-full h-full object-cover rounded-lg hidden">
                            </div>

                            <!-- Frame Foto 2 -->
                            <div
                                class="h-20 w-20 border-dashed border-2 border-zinc-300 dark:border-zinc-600 rounded-lg text-center relative">
                                <input type="file" name="photo2" class="hidden" id="product-photo-2" accept="image/*"
                                    onchange="previewImage(2)">
                                <button type="button" onclick="document.getElementById('product-photo-2').click()"
                                    class="text-red-600 text-xs mt-5">Tambahkan Foto 2</button>
                                <img id="image-preview-2" src="" alt="Pratinjau Gambar 2"
                                    class="absolute top-0 left-0 w-full h-full object-cover rounded-lg hidden">
                            </div>

                            <!-- Frame Foto 3 -->
                            <div
                                class="h-20 w-20 border-dashed border-2 border-zinc-300 dark:border-zinc-600 rounded-lg text-center relative">
                                <input type="file" name="photo3" class="hidden" id="product-photo-3" accept="image/*"
                                    onchange="previewImage(3)">
                                <button type="button" onclick="document.getElementById('product-photo-3').click()"
                                    class="text-red-600 text-xs mt-5">Tambahkan Foto 3</button>
                                <img id="image-preview-3" src="" alt="Pratinjau Gambar 3"
                                    class="absolute top-0 left-0 w-full h-full object-cover rounded-lg hidden">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="flex flex-col md:flex-row font-medium mb-1 ml-2 md:ml-16">Nama Produk
                            <input type="text" name="name"
                                class="w-[15rem] md:w-[40rem] border-zinc-300 border rounded-lg p-2 ml-0 md:ml-5"
                                placeholder="Nama Produk" required>
                        </label>
                    </div>

                    <div class="mb-4">
                        <label class="flex flex-col md:flex-row font-medium mb-1 ml-2 md:ml-24">Kategori
                            <select name="category_id"
                                class="w-[15rem] md:w-[40rem] border-zinc-300 border rounded-lg p-2 md:ml-6" required>
                                <option value="">Pilih kategori</option>
                                <option value="1">Electronics</option>
                                <option value="2">Fashion</option>
                                <option value="3">Book</option>
                                <option value="4">Beauty & Health</option>
                                <option value="5">Sports & Outdoors</option>
                                <option value="6">Toys & Hobbies</option>
                                <option value="7">Automotive</option>
                                <option value="8">Books</option>
                                <option value="9">Groceries</option>
                                <option value="10">Office Supplies</option>
                            </select>
                        </label>
                    </div>

                    <div class="mb-4">
                        <label class="flex flex-col md:flex-row font-medium mb-1 ml-2 md:ml-24">Harga
                            <input type="number" name="price"
                                class="w-[15rem] md:w-[40rem] border-zinc-300 border rounded-lg p-2 ml-0 md:ml-10"
                                placeholder="Harga" required>
                        </label>
                    </div>

                    <div class="flex flex-col md:flex-row items-start space-x-2 md:space-x-4 mb-4">
                        <label for="product-description" class="text-sm font-medium  ml-2 md:ml-14">Deskripsi Produk</label>
                        <textarea id="product-description" name="description" rows="5"
                            class="border border-gray-300 rounded-lg pb-6 ml-0 md:ml-7 w-[15rem] md:w-[40rem] focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="flex flex-col md:flex-row font-medium mb-1 ml-2 md:ml-24">Status
                            <select name="status"
                                class="w-[15rem] md:w-[40rem] border-zinc-300 border rounded-lg p-2 ml-0 md:ml-10" required>
                                <option value="tersedia">Tersedia</option>
                                <option value="habis">Habis</option>
                            </select>
                        </label>
                    </div>

                    <div class="flex justify-start md:justify-end md:mx-8 mx-0 space-x-2 mt-10">
                        <a href="{{ route('merchant.products.index') }}"
                            class="bg-zinc-200 dark:bg-zinc-700 text-zinc-700 dark:text-zinc-200 px-4 py-2 rounded-lg">Kembali</a>
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg">Simpan &
                            Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        function previewImage(index) {
            const input = document.getElementById(`product-photo-${index}`);
            const preview = document.getElementById(`image-preview-${index}`);

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
