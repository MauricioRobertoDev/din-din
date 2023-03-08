<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\actingAs;

test('A senha pode ser atualizada', function () {
    $user = User::factory()->create();
    $data = [
        'current_password' => 'password',
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ];

    actingAs($user)
        ->from(route('profile.edit'))
        ->put(route('password.update'), $data)
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('profile.edit'));

    expect(Hash::check('new-password', $user->refresh()->password))->toBeTrue();
});

test('A senha correta deve ser fornecida para atualizar a senha', function () {
    $user = User::factory()->create();
    $data = [
        'current_password' => 'wrong-password',
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ];

    actingAs($user)
        ->from(route('profile.edit'))
        ->put(route('password.update'), $data)
        ->assertSessionHasErrorsIn('updatePassword', 'current_password')
        ->assertRedirect(route('profile.edit'));
});
