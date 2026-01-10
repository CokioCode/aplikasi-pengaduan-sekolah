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
        Schema::create('progres_perbaikan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_aspirasi')->constrained('aspirasi')->cascadeOnDelete();
            $table->text('keterangan_progres');
            $table->date('tanggal_update');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progres_perbaikan');
    }
};
