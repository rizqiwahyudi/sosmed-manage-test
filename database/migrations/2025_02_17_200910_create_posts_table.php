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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('brand');
            $table->text('desc')->nullable();
            $table->string('image')->nullable();
            $table->date('due_date');
            $table->string('platform');
            $table->decimal('payment', 10, 2)->nullable();
            $table->enum('status', ['todo', 'in_progress', 'approved', 'published'])->default('todo');
            $table->string('assigned_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
