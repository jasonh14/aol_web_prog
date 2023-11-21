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
        Schema::create('chatbots', function (Blueprint $table) {
            $table->integer('chatbot_id', true);
            $table->integer('user_id')->nullable()->index('user_id');
            $table->string('chatbot_name');
            $table->string('chatbot_webhook_url');
            $table->string('image_url');
            $table->string('req_url');
            $table->text('chatbot_description')->nullable();
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('deletedAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chatbots');
    }
};
