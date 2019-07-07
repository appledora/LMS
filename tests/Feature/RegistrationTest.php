<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function student_registers(){
        $response = $this ->json('POST','/register');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

}
