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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // item id
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
            $table->string('item_code'); // item code name
            $table->string('item_desc'); // item name description  
            $table->decimal('item_price', 10, 2)->nullable(); // item pricing
            $table->string('item_group')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
