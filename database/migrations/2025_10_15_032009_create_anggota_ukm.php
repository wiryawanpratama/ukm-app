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
    Schema::create('anggota_ukm', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nim')->unique();
        $table->string('prodi');
        $table->year('angkatan');
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->string('no_hp')->nullable();
        $table->string('email')->nullable();
        $table->text('alamat')->nullable();
        $table->string('foto')->nullable(); // untuk upload foto anggota
        $table->foreignId('ukm_id')->constrained('ukm')->onDelete('cascade');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_ukm');
    }
};
