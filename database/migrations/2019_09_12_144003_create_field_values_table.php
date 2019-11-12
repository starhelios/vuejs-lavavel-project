<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('field_id')->index();
            $table->string('name');
            $table->string('label_part')->nullable();
            $table->unsignedInteger('agency_id')->index()->nullable();
            $table->unsignedInteger('country_id')->index()->nullable();
            $table->boolean('global_available')->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_values');
    }
}
