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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('kode_member', 10)->unique(); // Pengganti NIM
            $table->string('nama');
            $table->string('email')->unique();
            $table->enum('layanan', ['Basic', 'Premium', 'VIP']); // Pengganti Jurusan
            $table->decimal('biaya_bulanan', 10, 2); // Pengganti IPK
            $table->integer('durasi_kontrak'); // Pengganti Semester
            $table->boolean('status_aktif')->default(true); // Pengganti Aktif
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
