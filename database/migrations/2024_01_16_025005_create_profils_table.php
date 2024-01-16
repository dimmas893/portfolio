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
            $table->string('nama');
            $table->longText('foto')->nullable();
            $table->string('profesi');
            $table->string('profesi_detail');
            $table->string('github');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
