<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('field_type')->index()->default('select');
            $table->enum('field_entity', ['campaign', 'line_item', 'creative', 'insertion_order'])->default('campaign');
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
