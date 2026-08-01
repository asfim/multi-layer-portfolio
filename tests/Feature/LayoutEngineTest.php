<?php

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('frontend renders active layout successfully', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

test('admin can switch active layout template', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/admin/layouts/select', [
        'layout' => 'layout2_doctor',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('theme_settings', [
        'active_layout' => 'layout2_doctor',
    ]);
});
