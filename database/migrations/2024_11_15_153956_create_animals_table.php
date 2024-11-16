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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Type::class)->constrained();
            $table->foreignIdFor(\App\Models\Breed::class)->constrained();
            $table->string('name');
            $table->integer('age');
            $table->longText('description');
            $table->integer('price');
            $table->enum('status', ['en vente', 'vendu'])->default('en vente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};