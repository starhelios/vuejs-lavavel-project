<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('countries', function (Blueprint $table) {
          $table->dropColumn('iso1');
          $table->dropColumn('iso2');
          $table->string('code')->nullable()->index();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('countries', function (Blueprint $table) {
          $table->dropColumn('code');
          $table->string('iso1')->nullable()->index();
          $table->string('iso2')->nullable()->index();
      });
    }
}
