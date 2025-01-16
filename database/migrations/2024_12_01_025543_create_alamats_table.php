<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alamat', function (Blueprint $table) {
            // Laravolt schema
            // $table->id();
            // $table->string('alamat_lengkap');
            // $table->foreignId('kelurahan_id')->constrained(config('laravolt.indonesia.table_prefix') . 'villages');
            // $table->foreignId('kecamatan_id')->constrained(config('laravolt.indonesia.table_prefix') . 'districts');
            // $table->foreignId('kabupaten_id')->constrained(config('laravolt.indonesia.table_prefix') . 'cities');
            // $table->foreignId('provinsi_id')->constrained(config('laravolt.indonesia.table_prefix') . 'provinces');
            // $table->string('kode_pos');
            // $table->foreignId('user_id')->constrained('users');
            // $table->timestamps();

            // manual schema
            $table->id();
            $table->string('alamat_lengkap');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kode_pos');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamats');
    }
};
