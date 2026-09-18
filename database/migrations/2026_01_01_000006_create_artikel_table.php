<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();

            $table->string('judul');

            $table->foreignId('kategori_artikel_id')
                ->nullable()
                ->constrained('kategori_artikels')
                ->nullOnDelete();

            $table->longText('isi');

            $table->string('gambar')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};