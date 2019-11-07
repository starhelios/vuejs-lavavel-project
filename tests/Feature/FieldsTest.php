<?php

namespace Tests\Feature;

use App\Field;
use App\User;
use Laravel\Passport\Passport;
use Tests\TestCase;

class FieldsTest extends TestCase
{

    public function test_as_a_user_i_can_see_fields_at_the_api()
    {
        $user = factory(User::class)->create();
        Passport::actingAs($user);
        $field = factory(Field::class)->create();

        $response = $this->get('/api/fields');
        $response->assertStatus(200);
        $response->assertSee($field->name);
    }
}
