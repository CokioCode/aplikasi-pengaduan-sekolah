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
        Schema::create('umpan_balik', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_aspirasi')->constrained('aspirasi')->cascadeOnDelete();
            $table->foreignUuid('id_user')->constrained('users')->cascadeOnDelete();
            $table->text('isi_umpan_balik');
            $table->date('tanggal_umpan_balik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umpan_balik');
    }
};
