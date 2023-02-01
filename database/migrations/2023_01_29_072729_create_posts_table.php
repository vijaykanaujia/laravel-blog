<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyText('title')->nullable(false);
            $table->string('slug')->nullable()->unique();
            $table->tinyText('description')->nullable();
            $table->enum('status', ['pending','published', 'draft', 'private'])->default('pending');
            $table->longText('content')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->fullText(['title', 'content']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
