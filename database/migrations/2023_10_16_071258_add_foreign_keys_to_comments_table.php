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
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign(['replied_comment_id'], 'comments_ibfk_3')->references(['comment_id'])->on('comments')->onDelete('SET NULL');
            $table->foreign(['chatbot_id'], 'comments_ibfk_2')->references(['chatbot_id'])->on('chatbots')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'comments_ibfk_1')->references(['user_id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_ibfk_3');
            $table->dropForeign('comments_ibfk_2');
            $table->dropForeign('comments_ibfk_1');
        });
    }
};
