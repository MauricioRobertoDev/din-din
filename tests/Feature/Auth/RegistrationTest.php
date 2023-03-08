<?php

declare(strict_types=1);

use App\Providers\RouteServiceProvider;

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('registration screen can be rendered', function () {
    get(route('register'))
        ->assertStatus(200);
});

test('new users can register', function () {
    $data = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ];

    post(route('register'), $data)
        ->assertRedirect(RouteServiceProvider::HOME);

    assertAuthenticated();
});
