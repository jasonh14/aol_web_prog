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
        Schema::create('reply_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')
                  ->references('id')->on('chat_sessions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('message_id')->nullable()
                  ->references('id')->on('chat_messages')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('token');
            $table->integer('usage_left')->default(5);
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
        Schema::dropIfExists('reply_tokens');
    }
};
