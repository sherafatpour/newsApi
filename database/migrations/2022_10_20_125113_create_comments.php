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
            $table->id();
            $table->string("comment");
            $table->unsignedBigInteger("news_id");
            $table->unsignedBigInteger("tags_id");

            $table->foreign("news_id")
            ->references("id")
            ->on("news")
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('tags_id')
            ->references('id')
            ->on('tags')
            ->onDelete('cascade');
            
            $table->softDeletes();
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
        Schema::dropIfExists('comments');
    }
};
