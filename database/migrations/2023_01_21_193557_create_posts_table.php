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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('body');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id', 'posts_user_idx');
            $table->foreign('user_id', 'posts_user_fk')
                ->on('users')
                ->references('id');

            $table->index('category_id', 'posts_category_idx');
            $table->foreign('category_id', 'posts_category_fk')
                ->on('categories')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
