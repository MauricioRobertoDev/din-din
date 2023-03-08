<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('A rota deve estar disponível e funcional', function () {
    get(route('password.request'))
        ->assertStatus(200);
});

test('Deve ser enviado o link para cofnirmar alteração de senha', function () {
    Notification::fake();

    $user = User::factory()->create();

    post(route('password.email'), ['email' => $user->email]);

    Notification::assertSentTo($user, ResetPassword::class);
});

test('A tela de redefinição de senha deve ser renderizada', function () {
    Notification::fake();

    $user = User::factory()->create();

    post(route('password.email'), ['email' => $user->email]);

    Notification::assertSentTo($user, ResetPassword::class, function ($notification) {
        get(route('password.reset', [$notification->token]))
            ->assertStatus(200);

        return true;
    });
});

test('A senha pode ser redefinida com token válido', function () {
    Notification::fake();

    $user = User::factory()->create();

    post(route('password.email'), ['email' => $user->email]);

    Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user) {
        $data = [
            'token' => $notification->token,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        post(route('password.store'), $data)
            ->assertSessionHasNoErrors();

        return true;
    });
});
