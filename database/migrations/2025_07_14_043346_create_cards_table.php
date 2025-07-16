<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
             $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name_on_card');
            $table->string('card_no');
            $table->string('cvc');
            $table->string('from_date');
            $table->string('exp_date');
            $table->string('type');
            $table->string('last4');
            $table->string('balance');
            $table->integer('is_default')->default(0);
            $table->integer('card_status')->default(0);
            $table->unique(['card_no'], 'cards_unique');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
