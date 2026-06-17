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
            $table->id(); // Ini penting agar ada ID unik (Primary Key)
            $table->string('kode_member', 50)->unique(); 
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no_hp', 20); // TAMBAHKAN KOLOM INI
            $table->integer('usia')->nullable(); // Tambahkan jika perlu
            $table->string('layanan'); 
            $table->decimal('biaya_bulanan', 15, 2); 
            $table->string('durasi_kontrak'); 
            $table->string('status_aktif');
            $table->string('foto')->nullable(); // Tambahkan jika perlu
            $table->unsignedBigInteger('user_id')->nullable(); // Tambahkan jika perlu
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
