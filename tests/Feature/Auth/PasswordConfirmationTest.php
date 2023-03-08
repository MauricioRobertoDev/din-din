<?php

declare(strict_types=1);

use App\Models\User;
use App\Providers\RouteServiceProvider;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('Deve redirecionar caso usuário não esteja logado', function () {
    get(route('password.confirm'))
        ->assertRedirect(route('login'));
});

test('A rota deve estar disponível e funcional', function () {
    $user = User::factory()->create();

    actingAs($user)->get(route('password.confirm'))
        ->assertStatus(200);
});

test('Deve confirmar a senha', function () {
    $user = User::factory()->create();
    $data = [
        'password' => 'password',
    ];

    actingAs($user)
        ->post(route('password.confirm'), $data)
        ->assertRedirect(RouteServiceProvider::HOME)
        ->assertSessionHasNoErrors();
});

test('Não deve confirmar a senha caso esteja errada', function () {
    $user = User::factory()->create();
    $data = [
        'password' => 'wrong-password',
    ];

    actingAs($user)
        ->post(route('password.confirm'), $data)
        ->assertSessionHasErrors();
});
