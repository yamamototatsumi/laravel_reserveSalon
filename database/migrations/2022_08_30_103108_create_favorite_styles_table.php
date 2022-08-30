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
        Schema::create('favorite_styles', function (Blueprint $table) {
          $table->id();
          $table->foreignId('style_id')->constrained()->onUpdate('cascade'); //外部キー制約
          $table->foreignId('user_id')->constrained()->onUpdate('cascade'); //外部キー制約
          $table->timestamps();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_styles');
    }
};
