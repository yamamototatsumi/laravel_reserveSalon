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
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('login_id')->uniqie();
            $table->string('password');
            $table->string('address');
            $table->string('prefectere');
            $table->string('city');
            $table->string('station');
            $table->string('header_photo_path', 2048)->nullable();
            $table->string('logo_photo_path', 2048)->nullable();
            $table->string('catchcopy')->nullable();
            $table->string('information')->nullable();
            $table->time('opened_time')->default('10:00:00');
            $table->time('closed_time')->default('20:00:00');
            $table->integer('holiday')->nullable();
            $table->integer('limit_frame')->default(1);
            $table->string('note')->nullable();
            $table->integer('role')->default(0);
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
        Schema::dropIfExists('salons');
    }
};
