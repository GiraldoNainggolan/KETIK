<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchant>
 */
class MerchantFactory extends Factory
{
    protected static ?int $i = 0;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static::$i++;
        if (static::$i > 10) static::$i = 1;

        // Default merchants data (based on the provided INSERT statements)
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
                'cover' => 'cover/otomotif.jpg',
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
                'logo' => 'logo/logo Batik Les.jpg',
                'cover' => 'cover/parfume.jpg',
                'latitude' => null,
                'longitude' => null,
            ],
            [
                'name' => 'Batik Sedayu Lestari',
                'email' => '@gmabatiksedayulestari@gmail.com',
                'password' => bcrypt('password'),
                'description' => 'salah satu toko batik ternama di gresik',
                'address' => 'Jl. Raya Sedayu No.10, Gres...',
                'type' => 'UMKM',
                'owner' => 'Nurul Hidayah',
                'logo' => 'logo/sepatu.jpg',
                'cover' => 'cover/sepatu.png',
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
                'logo' => 'logo/download.png',
                'cover' => 'cover/sport.jpg',
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
                'logo' => 'logo/download.png',
                'cover' => 'cover/sport.jpg',
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
                'logo' => 'logo/download.png',
                'cover' => 'cover/sport.jpg',
                'latitude' => null,
                'longitude' => null,
            ]
        ];

        // Insert the merchant data into the database
        return $merchants[static::$i - 1];
    }
}
