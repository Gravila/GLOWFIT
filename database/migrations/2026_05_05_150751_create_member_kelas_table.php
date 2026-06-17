<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        // Ubah 'bookings' menjadi 'member_kelas'
        Schema::create('member_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('member_id'); // ID member
            $table->string('kelas_gym_id'); // ID jadwal/kelas
            $table->string('nama_member'); // Tambahkan kolom agar sesuai
            $table->string('nama_kelas');  // Tambahkan kolom agar sesuai
            $table->string('jadwal_detail'); // Tambahkan kolom agar sesuai
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_kelas');
    }
};
