<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedInteger('order_column')->index()->nullable();
            $table->unsignedInteger('field_type')->index()->default(0);
            $table->unsignedInteger('position')->index()->default(0);
            $table->unsignedInteger('label_value_generation_type')->index()->default(0);
            $table->boolean('taggable')->default(0)->index();
            $table->boolean('global_available')->default(0)->index();
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
        Schema::dropIfExists('fields');
    }
}
