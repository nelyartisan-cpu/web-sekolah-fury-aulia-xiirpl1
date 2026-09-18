<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();

            $table->string('nama_sekolah');

            $table->text('alamat')->nullable();

            $table->text('visi')->nullable();

            $table->text('misi')->nullable();

            $table->longText('sejarah')->nullable();

            $table->string('logo')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};