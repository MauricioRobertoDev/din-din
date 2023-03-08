<?php

declare(strict_types=1);

use App\Models\User;
use App\Providers\RouteServiceProvider;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('A rota deve estar disponível e funcional', function () {
    get(route('login'))
        ->assertOk()
        ->assertViewIs('auth.login');
});

test('Usuário deve poder se autenticar', function () {
    $user = User::factory()->create();
    $data = [
        'email' => $user->email,
        'password' => 'password',
    ];

    assertGuest();

    post(route('login'), $data)
        ->assertRedirect(RouteServiceProvider::HOME);

    assertAuthenticated();
});

test('Usuário não deve poder se autenticar com senha errada', function () {
    $user = User::factory()->create();
    $data = [
        'email' => $user->email,
        'password' => 'wrong-password',
    ];

    assertGuest();

    post(route('login'), $data)
        ->assertSessionHasErrors();

    assertGuest();
});

test('Usuário deve ser redirecionado caso já esteja logado', function () {
    $user = User::factory()->create();
    $data = [
        'email' => $user->email,
        'password' => 'wrong-password',
    ];

    actingAs($user);

    assertAuthenticated();

    post(route('login'), $data)
        ->assertRedirect(route('dashboard'));
});

test('Usuário logado deve deslogar do sistema', function () {
    $user = User::factory()->create();
    actingAs($user);

    assertAuthenticated();

    post(route('logout'))
        ->assertRedirect(route('root'));
});
