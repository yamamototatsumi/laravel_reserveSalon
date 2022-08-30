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
        Schema::create('stylists', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->foreignId('salon_id')->constrained()->onUpdate('cascade'); //外部キー制約
          $table->string('profile_photo_path', 2048)->nullable();
          $table->string('style_photo_path_1', 2048)->nullable();
          $table->string('style_photo_path_2', 2048)->nullable();
          $table->integer('rank')->default(0);
          $table->integer('experience')->default(5);
          $table->string('catchcopy')->nullable();
          $table->string('information')->nullable();
          $table->string('appeal_technique')->nullable();
          $table->integer('favorite_count')->nullable()->default(0);
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
        Schema::dropIfExists('stylists');
    }
};
