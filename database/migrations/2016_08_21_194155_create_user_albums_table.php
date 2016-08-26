<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_albums', function (Blueprint $table) {
            $table->integer('album_id');
            $table->integer('user_id');
            $table->boolean('owner')->default(false);
            $table->boolean('read')->default(false);
            $table->boolean('write')->default(false);
            $table->boolean('delete')->default(false);

            $table->primary(['album_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_albums');
    }
}
