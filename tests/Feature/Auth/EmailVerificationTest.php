<?php

declare(strict_types=1);

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

use function Pest\Laravel\actingAs;

test('A rota deve estar disponível e funcional', function () {
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    actingAs($user)
        ->get(route('verification.notice'))
        ->assertStatus(200);
});

test('Deve redirectionar caso o usuário já tenha o email verificado', function () {
    $user = User::factory()->create();

    expect($user->hasVerifiedEmail())->toBeTrue();

    actingAs($user)
        ->get(route('verification.notice'))
        ->assertRedirect(RouteServiceProvider::HOME);
});

test('Deve poder verificar o email', function () {
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    actingAs($user)
        ->get($verificationUrl)
        ->assertRedirect(RouteServiceProvider::HOME.'?verified=1');

    Event::assertDispatched(Verified::class);

    expect($user->fresh()->hasVerifiedEmail())->toBeTrue();
});

test('O email não deve ser verificado com hash inválido', function () {
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('wrong-email')]
    );

    actingAs($user)
        ->get($verificationUrl);

    expect($user->fresh()->hasVerifiedEmail())->toBeFalse();
});

test('Deve redirecionar caso o email já tenha sido verificado', function () {
    $user = User::factory()->create();

    expect($user->hasVerifiedEmail())->toBeTrue();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    actingAs($user)
        ->get($verificationUrl)
        ->assertRedirect(RouteServiceProvider::HOME.'?verified=1');
});

test('Deve redirecionar caso o email já tenha sido verificado e não enviar email', function () {
    $user = User::factory()->create();

    expect($user->hasVerifiedEmail())->toBeTrue();

    actingAs($user)
        ->post(route('verification.send'))
        ->assertRedirect(RouteServiceProvider::HOME);
});

test('Deve enviar um novo email de verificação', function () {
    Notification::fake();

    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    expect($user->hasVerifiedEmail())->toBeFalse();

    actingAs($user)
        ->post(route('verification.send'));

    Notification::assertSentTo($user, VerifyEmail::class);
});
