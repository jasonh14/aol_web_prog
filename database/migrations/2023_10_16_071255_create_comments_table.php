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
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('comment_id', true);
            $table->integer('user_id')->nullable()->index('user_id');
            $table->integer('chatbot_id')->nullable()->index('chatbot_id');
            $table->integer('replied_comment_id')->nullable()->index('replied_comment_id');
            $table->text('content');
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
        Schema::dropIfExists('comments');
    }
};
