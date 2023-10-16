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
        Schema::table('votes', function (Blueprint $table) {
            $table->foreign(['chatbot_id'], 'votes_ibfk_2')->references(['chatbot_id'])->on('chatbots')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'votes_ibfk_1')->references(['user_id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign('votes_ibfk_2');
            $table->dropForeign('votes_ibfk_1');
        });
    }
};
