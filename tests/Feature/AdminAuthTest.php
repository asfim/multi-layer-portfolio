<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('admin login page can be accessed', function () {
    $response = $this->get('/login');
    $response->assertStatus(200);
});

test('admin user can authenticate with correct credentials', function () {
    $user = User::factory()->create([
        'email' => 'testadmin@portfolio.test',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->post('/login', [
        'email' => 'testadmin@portfolio.test',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/admin/dashboard');
    $this->assertAuthenticatedAs($user);
});
