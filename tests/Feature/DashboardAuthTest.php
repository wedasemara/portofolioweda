<?php

use App\Models\User;

test('guest diarahkan ke halaman login', function () {
    $this->get('/dashboard')->assertRedirect('/login');
});

test('user bisa login dengan kredensial valid', function () {
    $user = User::factory()->create(['email' => 'admin@example.com']);

    $this->post('/login', [
        'email' => 'admin@example.com',
        'password' => 'password',
    ])->assertRedirect('/dashboard');

    $this->assertAuthenticatedAs($user);
});

test('login gagal dengan password salah', function () {
    User::factory()->create(['email' => 'admin@example.com']);

    $this->from('/login')->post('/login', [
        'email' => 'admin@example.com',
        'password' => 'salah',
    ])->assertRedirect('/login')->assertSessionHasErrors('email');

    $this->assertGuest();
});

test('user bisa logout', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->post('/logout')->assertRedirect('/');

    $this->assertGuest();
});
