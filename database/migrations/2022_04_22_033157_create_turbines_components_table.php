<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turbines_components', function (Blueprint $table) {
            $table->bigInteger('turbine_id')->unsigned();
            $table->bigInteger('component_id')->unsigned();

            $table->foreign('turbine_id')->references('id')->on('turbines')->onDelete('cascade');
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');

            $table->primary(['turbine_id', 'component_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turbines_components');
    }
};
