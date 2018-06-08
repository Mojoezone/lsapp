<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations. -m is the Migration, php artisan migrate to migrate the database
     *
     * @return void
     */
    public function up()
    {
        // post table
        Schema::create('posts', function (Blueprint $table) {
            // the table increment by id and a time stamp create at and update at
            $table->increments('id');
            $table->string('title');
            $table->mediumText('body');
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
