<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_form()
    {
        $response = $this->get('/ajax/register');

        $response->assertStatus(200);
    }

    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'Dery',
            'email' => 'dery@allhertweb.com',
        ]);
        $user2 = User::make([
            'name' => 'Dery1',
            'email' => 'dery@allhertweb.com',
        ]);
        $this->assertTrue($user1->name != $user2->name);
    }
}
