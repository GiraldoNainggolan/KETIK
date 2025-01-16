<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function show($kategori)
    {
        // Data pertanyaan dan jawaban berdasarkan kategori
        $dataPertanyaanJawaban = [
            'Belanja' => [
                'pertanyaan' => [
                    'Bagaimana cara mencari produk yang diinginkan?',
                    'Apa yang harus dilakukan jika produk tidak tersedia?',
                    'Apakah ada fitur wishlist untuk menyimpan produk favorit?',
                ],
                'jawaban' => [
                    'Anda dapat mencari produk menggunakan fitur pencarian yang terdapat pada halaman utama atau di halaman kategori.',
                    'Jika produk tidak tersedia, Anda dapat memilih produk serupa atau menghubungi layanan pelanggan kami.',
                    'Ya, ada fitur wishlist yang memungkinkan Anda untuk menyimpan produk favorit dan membelinya nanti.'
                ],
            ],
            'Penawaran & hadiah' => [
                'pertanyaan' => [
                    'Bagaimana cara mendapatkan diskon atau kupon hadiah?',
                    'Apakah ada promo khusus untuk pelanggan baru?',
                    'Bagaimana cara mengecek poin reward yang dimiliki?',
                ],
                'jawaban' => [
                    'Anda dapat mendapatkan diskon atau kupon hadiah melalui email atau halaman promo yang kami sediakan.',
                    'Pelanggan baru biasanya mendapatkan diskon khusus yang dapat digunakan pada pembelian pertama.',
                    'Poin reward dapat dicek melalui akun Anda pada halaman "Reward" di profil Anda.'
                ],
            ],
            'Pembayaran' => [
                'pertanyaan' => [
                    'Metode pembayaran apa saja yang tersedia?',
                    'Bagaimana cara menggunakan kode voucher saat pembayaran?',
                    'Apakah pembayaran dapat dicicil?',
                ],
                'jawaban' => [
                    'Kami menyediakan beberapa metode pembayaran seperti transfer bank, kartu kredit, dan pembayaran melalui e-wallet.',
                    'Kode voucher dapat digunakan dengan memasukkannya pada kolom yang tersedia saat proses checkout.',
                    'Beberapa produk mungkin dapat dibayar dengan cara cicilan, tergantung pada pilihan yang tersedia pada checkout.'
                ],
            ],
            'Pesanan & Pengiriman' => [
                'pertanyaan' => [
                    'Bagaimana cara melacak status pesanan?',
                    'Berapa lama waktu pengiriman biasanya?',
                    'Apakah bisa mengubah alamat setelah memesan?',
                ],
                'jawaban' => [
                    'Anda dapat melacak status pesanan dengan mengunjungi halaman "Pesanan Saya" di akun Anda atau menggunakan nomor resi pengiriman.',
                    'Waktu pengiriman bervariasi tergantung lokasi, namun biasanya pengiriman memakan waktu 3-5 hari kerja.',
                    'Jika pesanan belum diproses, Anda bisa mengubah alamat. Namun, setelah pesanan diproses, alamat tidak dapat diubah.'
                ],
            ],
            'Pengembalian Barang & Dana' => [
                'pertanyaan' => [
                    'Bagaimana prosedur untuk mengembalikan barang?',
                    'Berapa lama proses pengembalian dana?',
                    'Apakah ada biaya tambahan untuk pengembalian barang?',
                ],
                'jawaban' => [
                    'Prosedur pengembalian barang dapat dilakukan dengan menghubungi layanan pelanggan dan mengikuti petunjuk yang diberikan.',
                    'Pengembalian dana biasanya diproses dalam 5-7 hari kerja setelah barang dikembalikan.',
                    'Tidak ada biaya tambahan untuk pengembalian barang selama barang dalam kondisi baik dan sesuai syarat pengembalian.'
                ],
            ],
            'Informasi Umum' => [
                'pertanyaan' => [
                    'Bagaimana cara menghubungi layanan pelanggan?',
                    'Apa kebijakan privasi toko?',
                    'Di mana saya bisa membaca syarat dan ketentuan?',
                ],
                'jawaban' => [
                    'Anda dapat menghubungi layanan pelanggan melalui email di go.buy@gmail.com atau telepon di 0822 8667 9166.',
                    'Kebijakan privasi kami dapat dibaca di halaman "Kebijakan Privasi" yang terdapat di footer website.',
                    'Syarat dan ketentuan bisa ditemukan di halaman "Syarat dan Ketentuan" yang ada di footer website kami.'
                ],
            ],
            'Mitra' => [
                'pertanyaan' => [
                    'Bagaimana cara mendaftar sebagai mitra penjual?',
                    'Apa saja persyaratan untuk menjadi mitra?',
                    'Apakah mitra mendapatkan dukungan promosi dari platform?',
                ],
                'jawaban' => [
                    'Untuk mendaftar sebagai mitra penjual, Anda dapat mengisi formulir pendaftaran yang ada di halaman "Daftar Mitra".',
                    'Persyaratan untuk menjadi mitra termasuk memiliki produk yang sesuai dengan ketentuan kami dan memenuhi standar kualitas.',
                    'Ya, mitra dapat menerima dukungan promosi melalui fitur yang disediakan di platform kami.'
                ],
            ],
            'Akun' => [
                'pertanyaan' => [
                    'Bagaimana cara membuat akun baru?',
                    'Apa yang harus dilakukan jika lupa kata sandi?',
                    'Bagaimana cara menghapus akun secara permanen?',
                ],
                'jawaban' => [
                    'Untuk membuat akun baru, klik "Daftar" pada halaman utama dan ikuti instruksi yang diberikan.',
                    'Jika Anda lupa kata sandi, klik "Lupa Kata Sandi" di halaman login dan ikuti petunjuk untuk mereset kata sandi.',
                    'Jika Anda ingin menghapus akun, Anda dapat menghubungi layanan pelanggan untuk proses penghapusan.'
                ],
            ],
        ];

        // Validasi apakah kategori ada
        if (!array_key_exists($kategori, $dataPertanyaanJawaban)) {
            abort(404, 'Kategori tidak ditemukan.');
        }

        return view('User.Pages.Layanan.kategori-pertanyaan', [
            'kategori' => $kategori,
            'pertanyaan' => $dataPertanyaanJawaban[$kategori]['pertanyaan'],
            'jawaban' => $dataPertanyaanJawaban[$kategori]['jawaban'],
        ]);
    }
}