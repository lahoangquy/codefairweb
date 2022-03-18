<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->enum('post_type', ['event', 'challenge', 'competition']);
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('award')->nullable();
            $table->string('deadline')->nullable();
            $table->text('preparing')->nullable();
            $table->text('apply_to_object')->nullable();
            $table->boolean('status')->default(1);
            $table->text('attachment_pdf')->nullable();
            $table->mediumText('thumbnail')->nullable();
            $table->text('short_intro')->nullable();
            $table->longText('description')->nullable();
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
}
