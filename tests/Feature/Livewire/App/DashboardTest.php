<?php

declare(strict_types=1);

use App\Http\Livewire\App\Dashboard;
use App\Models\User;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('Deve redirecionar para login caso o usuário não esteja logado', function () {
    get(route('dashboard'))
        ->assertStatus(302)
        ->assertRedirect(route('login'));
});

test('Deve renderizar a tela de dashboard', function () {
    actingAs($this->user);

    get(route('dashboard'))
        ->assertStatus(200)
        ->assertOk();

    Livewire::test(Dashboard::class)
        ->assertHasNoErrors()
        ->assertViewIs('livewire.app.dashboard');
});
