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
        Schema::create('styles', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->foreignId('salon_id')->constrained()->onUpdate('cascade'); //外部キー制約
          $table->foreignId('stylist_id')->constrained()->onUpdate('cascade'); //外部キー制約
          $table->string('photo_path', 2048)->nullable();
          $table->string('information')->nullable();
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
        Schema::dropIfExists('styles');
    }
};
