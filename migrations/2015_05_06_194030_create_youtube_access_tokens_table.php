<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYoutubeAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youtube_access_tokens_list', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('channel_id')->nullable();
            $table->integer('status')->default(1);
            $table->text('access_token');
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
        Schema::drop('youtube_access_tokens_list');
    }
}