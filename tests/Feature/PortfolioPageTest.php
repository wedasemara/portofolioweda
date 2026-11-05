<?php

test('halaman portfolio menampilkan konten dari database', function () {
    $this->seed();

    $this->get('/')
        ->assertOk()
        ->assertSee('FREELANCE VIDEO EDITOR')
        ->assertSee('Clip dr. Tirta KPI')
        ->assertSee('Instagram Reels');
});
