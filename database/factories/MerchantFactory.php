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

        // Insert the merchant data into the database
        return $merchants[static::$i - 1];
    }
}
