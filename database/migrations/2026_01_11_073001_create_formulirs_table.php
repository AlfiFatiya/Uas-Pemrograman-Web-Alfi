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
       Schema::create('formulirs', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('username');
        $table->string('email')->unique();
        $table->string('password');
        $table->text('alamat');
        $table->string('provinsi');
        $table->string('negara');
        $table->string('kode_pos', 10);
        $table->string('handphone', 15);
        $table->decimal('Latitude', 10, 8)->nullable();
        $table->decimal('Longitude', 11, 8)->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulirs');
    }
};
