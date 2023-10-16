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
        Schema::table('chatbots', function (Blueprint $table) {
            $table->foreign(['user_id'], 'chatbots_ibfk_1')->references(['user_id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chatbots', function (Blueprint $table) {
            $table->dropForeign('chatbots_ibfk_1');
        });
    }
};
