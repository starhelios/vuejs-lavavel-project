<?php

use Illuminate\Database\Seeder;

class FieldsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Field::class, 40)->create();
    }
}
