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
        Schema::create('menus', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->foreignId('salon_id')->constrained()->onUpdate('cascade'); //外部キー制約
          $table->string('profile_photo_path', 2048)->nullable();
          $table->integer('price');
          $table->string('information')->nullable();
          $table->boolean('is_cut')->nullable()->default(false);
          $table->boolean('is_color')->nullable()->default(false);
          $table->boolean('is_parm')->nullable()->default(false);
          $table->boolean('is_straight')->nullable()->default(false);
          $table->boolean('is_treatment')->nullable()->default(false);
          $table->boolean('is_spa')->nullable()->default(false);
          $table->integer('order');
          $table->boolean('is_visiable')->default(true);
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
        Schema::dropIfExists('menus');
    }
};
