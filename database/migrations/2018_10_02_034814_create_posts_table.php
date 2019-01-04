<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('post_title')->unique();
            $table->text('post_body');
            $table->string('post_image')->nullable();
            $table->tinyInteger('post_status')->default(0);
            $table->integer('user_id')->index()->unsigned();
            $table->integer('post_category_id')->index()->unsigned();
            // addition/experiment ko lang ang photo_id
            $table->integer('photo_id')->index()->unsigned();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
