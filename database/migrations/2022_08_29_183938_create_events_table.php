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
        Schema::create('events', function (Blueprint $table) {
          $table->id();
          $table->foreignId('salon_id')->constrained()->onUpdate('cascade'); //外部キー制約
          $table->foreignId('stylist_id')->constrained()->onUpdate('cascade'); //外部キー制約
          $table->foreignId('user_id')->constrained()->onUpdate('cascade'); //外部キー制約
          $table->datetime('start_date'); 
          $table->datetime('end_date'); 
          $table->string('information')->nullable(); 
          $table->string('memo')->nullable(); 
          $table->integer('price');
          $table->datetime('checked_at')->nullable();
          $table->datetime('canceled_at')->nullable();
          $table->timestamps();
          $table->string('name'); 
          $table->integer('max_people'); 
          $table->boolean('is_visible'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
