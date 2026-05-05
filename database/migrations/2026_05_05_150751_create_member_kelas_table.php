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
        Schema::create('member_kelas', function (Blueprint $table) {
            $table->id();
            // member_id merujuk ke id di tabel members
            $table->foreignId('member_id')->constrained()->onDelete('cascade');
            // kelas_gym_id merujuk ke id di tabel kelas_gyms
            $table->foreignId('kelas_gym_id')->constrained()->onDelete('cascade');
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
