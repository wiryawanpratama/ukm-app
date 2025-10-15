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
    Schema::create('ukm', function (Blueprint $table) {
        $table->id();
        $table->string('nama_ukm');
        $table->string('bidang');
        $table->text('deskripsi')->nullable();
        $table->string('ketua_ukm');
        $table->string('kontak')->nullable();
        $table->string('logo')->nullable();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // 👈 tambahkan ini
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukm');
    }
};
