<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataset extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('datasets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->text('abstract')->nullable();
            $table->string('updateFrequency')->nullable();
            $table->string('refreshed')->nullable();
            $table->string('resource')->nullable();
            $table->string('extentStart')->nullable();
            $table->string('extentEnd')->nullable();
            $table->string('verticalExtent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('datasets');
    }
}
