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
            $table->string('body');
            $table->bigInteger('reacts_count')->default(0);
            $table->bigInteger('comments_count')->default(0);
            $table->integer('image_id')->nullable();;
            $table->integer('creator_id');
            $table->integer('friend_id')->nullable();;
            $table->integer('group_id')->nullable();;
            $table->integer('shared_id')->nullable();;
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
