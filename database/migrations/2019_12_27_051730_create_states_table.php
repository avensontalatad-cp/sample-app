<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60)->index();
            $table->integer('country_id', false, true)->nullable();
            $table->integer('region_id', false, true)->nullable();
            $table->integer('order', false, true)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->nullableTimestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
