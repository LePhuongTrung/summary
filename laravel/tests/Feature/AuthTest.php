<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Infrastructure\Eloquent\EloquentUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = EloquentUser::factory()->create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('Asdasd123@'),
        ]);
    }

    public function testLoginWithCorrectCredentials()
    {
        $response = $this->postJson('/api/v1/auth/login', [
            'email' => 'test@gmail.com',
            'password' => 'Asdasd123@',
        ]);

        $response->assertStatus(200);

        $response->assertJson([
            'response_body' => [
                'user' => [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                    'email_verified_at' =>$this->user->email_verified_at->format('Y-m-d\TH:i:s.u\Z'),
                    'created_at' => $this->user->created_at->format('Y-m-d\TH:i:s.u\Z'),
                    'updated_at' => $this->user->updated_at->format('Y-m-d\TH:i:s.u\Z'),
                ],
                'token' => true
            ],
        ]);
    }


    public function testLoginWithIncorrectCredentials()
    {
        $response  = $this->postJson('/api/v1/auth/login', [
            'email' => 'test@gmail.com',
            'password' => 'Asdasd123@@',
        ]);
        $response->assertJson(
            [
                'response_body' => [
                    'message' => [
                        'error' => 'UNAUTHORIZED',
                    ]
                ]
            ],
            401
        );
    }

    public function testLoginWithIncorrectPasswordFormat()
    {
        $response  = $this->postJson('/api/v1/auth/login', [
            'email' => 'test@gmail.com',
            'password' => 'Asdasd123',
        ]);
        $response->assertJson(
            [
                'response_body' => [
                    'message' => [
                        'password' => 'The password field format is invalid.',
                    ]
                ]
            ],
            400
        );
        $response->assertJson([
            'response_body' => [
                'message' => []
            ],
        ]);
    }

    public function testLoginWithIncorrectEmailFormat()
    {
        $response  = $this->postJson('/api/v1/auth/login', [
            'email' => 'testGmail.com',
            'password' => 'Asdasd123',
        ]);
        $response->assertJson(
            [
                'response_body' => [
                    'message' => [
                        'email' => 'The email field must be a valid email address.',
                        'password' => 'The password field format is invalid.',
                    ]
                ]
            ],
            400
        );
        $response->assertJson([
            'response_body' => [
                'message' => []
            ],
        ]);
    }
}
