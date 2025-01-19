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
                'name' => 'SEPHORA',
                'email' => 'sephora@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko kecantikan ternama di indonesia',
                'address' => 'Pakuwon Mall Level G G.42-43, Jl. Mayjend. Jonosew...',
                'type' => 'UMKM',
                'owner' => 'ikbar',
                'logo' => 'logo/beauty_logo.jpg',
                'cover' => 'cover/beauty.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'UFO',
                'email' => 'ufo@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'toko peralatan elektronik andalan anda',
                'address' => 'Jl. Kertajaya No.149, Airlangga, Kec. Gubeng, Sura...',
                'type' => 'UMKM',
                'owner' => 'nopal',
                'logo' => 'logo/ufo.jpg',
                'cover' => 'cover/ufo.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'GUNUNG AGUNG',
                'email' => 'gunungagung@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'toko buku sejak tahun 1953',
                'address' => 'Jl. Kwitang No.38, RT.1/RW.1, Kwitang, Kec. Senen,...',
                'type' => 'UMKM',
                'owner' => 'jauhari',
                'logo' => 'logo/buku.jpg',
                'cover' => 'cover/buku.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'LOTTE',
                'email' => 'lotte@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'menyediakan kebutuhan usaha untuk para pelanggan p...',
                'address' => 'Jalan Raya Pepelegi Indah kav. IV, Gg. Sawo, Dusun...',
                'type' => 'UMKM',
                'owner' => 'hong',
                'logo' => 'logo/lotte.jpg',
                'cover' => 'cover/Lotte-1.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'TOKOPARTS',
                'email' => 'tokoparts@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'menyediakan berbagai part bagian dari kendaraan an...',
                'address' => 'Jl. Dupak Raya, Gundih, Kec. Bubutan, Surabaya, Ja...',
                'type' => 'UMKM',
                'owner' => 'qiqi',
                'logo' => 'logo/download.jpg',
                'cover' => 'cover/otomotif.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'TANIA PERFUME',
                'email' => 'taniaperfume@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'menyediakan segala jenis parfum',
                'address' => 'Sebrang Mesjid Nurul Huda, Puncak Rd No.KM. 75 No....',
                'type' => 'UMKM',
                'owner' => 'sonhaji',
                'logo' => 'logo/parfume.jpeg',
                'cover' => 'cover/parfume.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'BATA',
                'email' => 'bata@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'menyediakan segala jenis sandal dan sepatu untuk b...',
                'address' => 'Jl. Samanhudi No.1, Kemuteran, Pekelingan, Kec. Gr...',
                'type' => 'UMKM',
                'owner' => 'fika',
                'logo' => 'logo/sepatu.jpg',
                'cover' => 'cover/sepatu.png',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'SPORT DIRECT',
                'email' => 'sportdirect@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'menyediakan berbagai jenis pakaian dan alat untuk ...',
                'address' => 'Kota Kasablanka, Menteng Dalam, Kec. Tebet, Kota J...',
                'type' => 'UMKM',
                'owner' => 'dafa',
                'logo' => 'logo/download.png',
                'cover' => 'cover/sport.jpg',
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
