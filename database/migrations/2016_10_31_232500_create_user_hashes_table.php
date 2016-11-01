<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_hashes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('hash_algorithm_id')->unsigned();
            $table->integer('vocabulary_id')->unsigned();
            $table->string('hash');
            $table->timestamps();
        });

        Schema::table('user_hashes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hash_algorithm_id')->references('id')->on('hash_algorithms')->onDelete('cascade');
            $table->foreign('vocabulary_id')->references('id')->on('vocabularies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_hashes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['hash_algorithm_id']);
            $table->dropForeign(['vocabulary_id']);
        });

        Schema::dropIfExists('user_hashes');
    }
}
