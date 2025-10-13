<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->foreignId('item_id')->nullable()->constrained('items')->nullOnDelete();
            $table->string('action');
            $table->integer('quantity')->nullable();
            $table->string('item_name_snapshot')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
