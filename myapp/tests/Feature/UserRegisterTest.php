<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * ユーザー登録テスト
     *
     * @return void
     */
    public function testVisitRegister()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function testUserRegister()
    {
        $this->post('/register', [
            'name' => 'テスト太郎',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            ])->assertStatus(302);

        $this->assertDatabaseHas('users', ['email' => 'test@test.com']);
    }
}
