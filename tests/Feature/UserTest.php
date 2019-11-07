<?php

namespace Tests\Feature;

use App\Agency;
use App\Country;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_have_an_agency()
    {
        $agency = factory(Agency::class)->create();
        $user = factory(User::class)->create(['agency_id' => $agency->id]);
        $this->assertEquals($user->agency->id, $agency->id);
    }

    public function test_a_user_can_be_related_to_a_country()
    {
        $country = factory(Country::class)->create();
        $user = factory(User::class)->create(['country_id' => $country->id]);
        $this->assertEquals($user->id, $country->id);
    }

}
