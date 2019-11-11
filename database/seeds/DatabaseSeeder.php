<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FieldsSeeder::class,
            UsersSeeder::class,
        ]);
        foreach(\App\Field::all() as $field) {
            factory(\App\FieldValue::class, 15)->create(['field_id' => $field->id]);
        }
    }
}
