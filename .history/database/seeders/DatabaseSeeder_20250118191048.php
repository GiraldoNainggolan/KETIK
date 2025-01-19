<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\User;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Merchant;
use Illuminate\Database\Seeder;
use App\Models\Vouchers;
use App\Models\VouchersDetail;

use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\VillagesSeeder;
use Laravolt\Indonesia\Seeds\DistrictsSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create unique voucher
        // $this->call([
        //     ProvincesSeeder::class,
        //     CitiesSeeder::class,
        //     DistrictsSeeder::class,
        //     VillagesSeeder::class,
        // ]);

        // Create 25 admin users
        Admin::factory(5)->create();
        Category::factory()->count(10)->create();

        // merchant
        $merchants = [
            [
                'name' => 'Batik Siwalan Jaya',
                'email' => 'batiksiwalanjaya@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko batik ternama di bangkalan',
                'address' => 'Jl. Raya Bangkalan No.12, Bangka...',
                'type' => 'UMKM',
                'owner' => 'Ahmad Rifai',
                'logo' => 'logo/btkmadura1.jpg',
                'cover' => 'cover/Batik Siwalan Jaya.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'Pesona Madura Batik',
                'email' => 'pesonamadurabatik@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko batik tertua di bangkalan',
                'address' => 'Jl. KH. Moh. Kholil No.21, Bangk...',
                'type' => 'UMKM',
                'owner' => 'Fatimah Zahra',
                'logo' => 'logo/btkmadura2.jpg',
                'cover' => 'cover/Pesona Madura Batik.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'Mega Batik Tangerang',
                'email' => 'megabatiktangerang@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko batik ternama di tangerang',
                'address' => 'Jl. Raya Serpong No.10, Tanger...',
                'type' => 'UMKM',
                'owner' => 'Budi Santoso',
                'logo' => 'logo/logo Mega Batik Tangerang.jpg',
                'cover' => 'cover/Mega Batik Tangerang.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'Harmoni Batik',
                'email' => 'harmonibatik@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko batik tertua di Tangerang',
                'address' => 'Jl. Boulevard Gading Serpong No.45, Tanger...',
                'type' => 'UMKM',
                'owner' => 'Lina Herlina',
                'logo' => 'logo/logo Harmoni Batik.jpg',
                'cover' => 'cover/Harmoni Batik.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'Batik Bromo Indah',
                'email' => 'batikbromoindah@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko batik ternama di pasuruan',
                'address' => 'Jl. Raya Nongkojajar No.17, Pasur...',
                'type' => 'UMKM',
                'owner' => 'Taufik Hidayat',
                'logo' => 'logo/logo Batik Bromo Indah.jpg',
                'cover' => 'cover/Batik Bromo Indah.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'Batik Lestari Pandaan',
                'email' => 'batiklestaripandaan@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko batik tertua di pasuruan',
                'address' => 'Jl. Pandaan Raya No.25, Pasur....',
                'type' => 'UMKM',
                'owner' => 'Iwan Kurniawan',
                'logo' => 'logo/logo Batik Lestari Pandaan.jpg',
                'cover' => 'cover/Batik Lestari Pandaan.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'Batik Sedayu Lestari',
                'email' => 'batiksedayulestari@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko batik ternama di gresik',
                'address' => 'Jl. Raya Sedayu No.10, Gres...',
                'type' => 'UMKM',
                'owner' => 'Nurul Hidayah',
                'logo' => 'logo/logo Batik Sedayu Lestari.jpg',
                'cover' => 'cover/Batik Sedayu Lestari.jng',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'Batik Giri Asri',
                'email' => 'batikgiriasri@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko batik tertua di gresik',
                'address' => 'Jl. Sunan Giri No.22, Gres...',
                'type' => 'UMKM',
                'owner' => 'Hadi Purwanto',
                'logo' => 'logo/logo Giri Asri.png',
                'cover' => 'cover/Batik Giri Asri.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'Batik Mojopahit Heritage',
                'email' => 'batikmojopahitheritage@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko batik ternama di jombang',
                'address' => 'Jl. Mojopahit No.10, Jomb...',
                'type' => 'UMKM',
                'owner' => 'Ratna Dewi',
                'logo' => 'logo/logo Batik Mojopahit Heritage.png',
                'cover' => 'cover/Batik Mojopahit Heritage.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'Batik Tirta Bening',
                'email' => 'batiktirtabening@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko batik tertua di jombang',
                'address' => 'Jl. Raya Ploso No.18, Jomb...',
                'type' => 'UMKM',
                'owner' => 'Agus Susanto',
                'logo' => 'logo/logo Batik Tirta Bening.png',
                'cover' => 'cover/Batik Tirta Bening.jpg',
                'latitude' => null,
                'longitude' => null,
            ]
        ];

        foreach ($merchants as $merchantData) {
            Merchant::create($merchantData);
        }

        // product
        $products = [
            1 => [
                'name' => 'AC',
                'description' => 'AC',
                'category_id' => Category::skip(2)->first()->id,
                'merchant_id' => Merchant::skip(1)->first()->id,
                'price' => 360000,
                'rating' => 0.00,
                'status' => 'tersedia',
                'photo' => 'product_photos/photo-1.jpg',
                'photo2' => 'product_photos/photo-2.jpg',
                'photo3' => 'product_photos/photo-3.jpg',
            ],
            2 => [
                'name' => 'Jam Dinding',
                'description' => 'Deskripsi Jam Dinding',
                'category_id' => Category::skip(2)->first()->id,
                'merchant_id' => Merchant::skip(1)->first()->id,
                'price' => 80000,
                'rating' => 0.00,
                'status' => 'habis',
                'photo' => 'product_photos/photo-4.jpg',
                'photo2' => 'product_photos/photo-5.jpg',
                'photo3' => 'product_photos/photo-6.jpg',
            ],
            3 => [
                'name' => 'Kulkas',
                'description' => 'Deskripsi Kulkas',
                'category_id' => Category::skip(2)->first()->id,
                'merchant_id' => Merchant::skip(1)->first()->id,
                'price' => 500000,
                'rating' => 0.00,
                'status' => 'tersedia',
                'photo' => 'product_photos/photo-7.jpg',
                'photo2' => 'product_photos/photo-8.jpg',
                'photo3' => 'product_photos/photo-9.jpg',
            ],
            4 => [
                'name' => 'Truk',
                'description' => 'Deskripsi Truk',
                'category_id' => Category::skip(8)->first()->id,
                'merchant_id' => Merchant::skip(4)->first()->id,
                'price' => 200000000,
                'rating' => 0.00,
                'status' => 'habis',
                'photo' => 'product_photos/photo-10.jpg',
                'photo2' => 'product_photos/photo-11.jpg',
                'photo3' => 'product_photos/photo-12.jpg',
            ],
            5 => [
                'name' => 'Mobil',
                'description' => 'Deskripsi Mobil',
                'category_id' => Category::skip(8)->first()->id,
                'merchant_id' => Merchant::skip(4)->first()->id,
                'price' => 100000000,
                'rating' => 0.00,
                'status' => 'tersedia',
                'photo' => 'product_photos/photo-13.jpg',
                'photo2' => 'product_photos/photo-14.jpg',
                'photo3' => 'product_photos/photo-15.jpg',
            ],
            6 => [
                'name' => 'Baju Kaos',
                'description' => 'Deskripsi Baju Kaos',
                'category_id' => Category::skip(3)->first()->id,
                'merchant_id' => Merchant::first()->id,
                'price' => 250000,
                'rating' => 0.00,
                'status' => 'habis',
                'photo' => 'product_photos/photo-16.jpg',
                'photo2' => 'product_photos/photo-17.jpg',
                'photo3' => 'product_photos/photo-18.jpg',
            ],
            7 => [
                'name' => 'Sepatu',
                'description' => 'Deskripsi Sepatu',
                'category_id' => Category::skip(3)->first()->id,
                'merchant_id' => Merchant::first()->id,
                'price' => 450000,
                'rating' => 0.00,
                'status' => 'tersedia',
                'photo' => 'product_photos/photo-19.jpg',
                'photo2' => 'product_photos/photo-20.jpg',
                'photo3' => 'product_photos/photo-21.jpg',
            ],
            8 => [
                'name' => 'Jaket',
                'description' => 'Deskripsi Jaket',
                'category_id' => Category::skip(3)->first()->id,
                'merchant_id' => Merchant::first()->id,
                'price' => 110000,
                'rating' => 0.00,
                'status' => 'habis',
                'photo' => 'product_photos/photo-22.jpg',
                'photo2' => 'product_photos/photo-23.jpg',
                'photo3' => 'product_photos/photo-24.jpg',
            ],
            9 => [
                'name' => 'Kursi Kantor',
                'description' => 'Deskripsi Kursi Kantor',
                'category_id' => Category::skip(4)->first()->id,
                'merchant_id' => Merchant::skip(4)->first()->id,
                'price' => 300000,
                'rating' => 0.00,
                'status' => 'tersedia',
                'photo' => 'product_photos/photo-25.jpg',
                'photo2' => 'product_photos/photo-26.jpg',
                'photo3' => 'product_photos/photo-27.jpg',
            ],
            10 => [
                'name' => 'Meja Kantor',
                'description' => 'Deskripsi Meja Kantor',
                'category_id' => Category::skip(4)->first()->id,
                'merchant_id' => Merchant::skip(4)->first()->id,
                'price' => 700000,
                'rating' => 0.00,
                'status' => 'habis',
                'photo' => 'product_photos/photo-28.jpg',
                'photo2' => 'product_photos/photo-29.jpg',
                'photo3' => 'product_photos/photo-30.jpg',
            ],
            11 => [
                'name' => 'Kursi Kantor',
                'description' => 'Deskripsi Kursi Kantor (Produk kedua)',
                'category_id' => Category::skip(4)->first()->id,
                'merchant_id' => Merchant::skip(4)->first()->id,
                'price' => 400000,
                'rating' => 0.00,
                'status' => 'tersedia',
                'photo' => 'product_photos/photo-31.jpg',
                'photo2' => 'product_photos/photo-32.jpg',
                'photo3' => 'product_photos/photo-33.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        // Create 25 merchants and users, each with related products, favorites, comments, and chats
        for ($i = 1; $i <= 25; $i++) {

            // Create a user
            $user = User::factory()->create();
            $vouchers = Vouchers::factory()->create();
            // Create a product for the merchant
            // Product::factory()->create(['merchant_id' => $merchant->id]);

            // Create a favorite for the user
            // Favorite::factory()->create(['user_id' => $user->id, 'product_id' => $i]);

            // Create a comment for the user
            // Comment::factory()->create(['user_id' => $user->id, 'product_id' => $i]);

            // Create a chat (using the new ChatFactory setup)
            // Chat::factory()->create(['sender_id' => $user->id, 'sender_type' => User::class]);


            //
        }
    }
}
