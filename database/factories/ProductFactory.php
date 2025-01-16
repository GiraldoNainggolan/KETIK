<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected static ?int $i = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static::$i++;
        if (static::$i > 10) static::$i = 1;

        // Menghitung index foto berdasarkan urutan data
        $photoIndex = (static::$i - 1) * 3 + 1;

        // Menentukan produk secara manual berdasarkan urutan
        $products = [
            1 => [
                'name' => 'AC',
                'description' => 'AC',
                'category_id' => Category::skip(3)->first()->id,  // Menggunakan kategori kedua
                'merchant_id' => Merchant::skip(1)->first()->id,  // Menggunakan merchant pertama
                'price' => 10000,
                'rating' => 4.5,
                'status' => 'tersedia',
            ],
            2 => [
                'name' => 'Produk 2',
                'description' => 'Deskripsi Produk 2',
                'category_id' => Category::skip(2)->first()->id,  // Menggunakan kategori ketiga
                'merchant_id' => Merchant::skip(2)->first()->id,  // Menggunakan merchant kedua
                'price' => 20000,
                'rating' => 4.5,
                'status' => 'habis',
            ],
            3 => [
                'name' => 'Produk 3',
                'description' => 'Deskripsi Produk 3',
                'category_id' => Category::skip(3)->first()->id,  // Menggunakan kategori keempat
                'merchant_id' => Merchant::skip(3)->first()->id,  // Menggunakan merchant ketiga
                'price' => 30000,
                'rating' => 4.5,
                'status' => 'tersedia',
            ],
            4 => [
                'name' => 'Produk 4',
                'description' => 'Deskripsi Produk 4',
                'category_id' => Category::skip(4)->first()->id,  // Menggunakan kategori kelima
                'merchant_id' => Merchant::skip(4)->first()->id,  // Menggunakan merchant keempat
                'price' => 40000,
                'rating' => 4.5,
                'status' => 'habis',
            ],
            5 => [
                'name' => 'Produk 5',
                'description' => 'Deskripsi Produk 5',
                'category_id' => Category::skip(5)->first()->id,  // Menggunakan kategori keenam
                'merchant_id' => Merchant::skip(5)->first()->id,  // Menggunakan merchant kelima
                'price' => 50000,
                'rating' => 4.5,
                'status' => 'tersedia',
            ],
            6 => [
                'name' => 'Produk 6',
                'description' => 'Deskripsi Produk 6',
                'category_id' => Category::skip(6)->first()->id,  // Menggunakan kategori ketujuh
                'merchant_id' => Merchant::skip(6)->first()->id,  // Menggunakan merchant keenam
                'price' => 60000,
                'rating' => 4.5,
                'status' => 'habis',
            ],
            7 => [
                'name' => 'Produk 7',
                'description' => 'Deskripsi Produk 7',
                'category_id' => Category::skip(7)->first()->id,  // Menggunakan kategori kedelapan
                'merchant_id' => Merchant::skip(7)->first()->id,  // Menggunakan merchant ketujuh
                'price' => 70000,
                'rating' => 4.5,
                'status' => 'tersedia',
            ],
            8 => [
                'name' => 'Produk 8',
                'description' => 'Deskripsi Produk 8',
                'category_id' => Category::skip(8)->first()->id,  // Menggunakan kategori kesembilan
                'merchant_id' => Merchant::skip(8)->first()->id,  // Menggunakan merchant kedelapan
                'price' => 80000,
                'rating' => 4.5,
                'status' => 'habis',
            ],
            9 => [
                'name' => 'Produk 9',
                'description' => 'Deskripsi Produk 9',
                'category_id' => Category::skip(9)->first()->id,  // Menggunakan kategori kesepuluh
                'merchant_id' => Merchant::skip(9)->first()->id,  // Menggunakan merchant kesembilan
                'price' => 90000,
                'rating' => 4.5,
                'status' => 'tersedia',
            ],
            10 => [
                'name' => 'Produk 10',
                'description' => 'Deskripsi Produk 10',
                'category_id' => Category::skip(10)->first()->id,  // Menggunakan kategori kesebelas
                'merchant_id' => Merchant::skip(10)->first()->id,  // Menggunakan merchant kesepuluh
                'price' => 100000,
                'rating' => 4.5,
                'status' => 'habis',
            ],
        ];

        // Mengambil produk yang sesuai dengan iterasi
        $product = $products[static::$i];

        // Menambahkan foto berdasarkan urutan produk
        return array_merge($product, [
            'photo' => 'product_photos/photo-' . $photoIndex . '.jpg',
            'photo2' => 'product_photos/photo-' . ($photoIndex + 1) . '.jpg',
            'photo3' => 'product_photos/photo-' . ($photoIndex + 2) . '.jpg',
        ]);
    }
}
