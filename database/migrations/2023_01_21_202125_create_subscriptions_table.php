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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('subscriber_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('creator_id', 'subscriptions_creator_idx');
            $table->foreign('creator_id', 'subscriptions_creator_fk')
                ->on('users')
                ->references('id');

            $table->index('subscriber_id', 'subscriptions_subscriber_idx');
            $table->foreign('subscriber_id', 'subscriptions_subscriber_fk')
                ->on('users')
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
        Schema::dropIfExists('subscriptions');
    }
};
