<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response
        ->assertOk()
        ->assertSee('lang="en" dir="ltr"', false)
        ->assertSee('Find a place that feels like', false)
        ->assertSee('x-data="{ menuOpen: false }"', false)
        ->assertSee('aria-controls="mobile-navigation"', false);
});

test('the public layout renders Arabic copy with right-to-left direction', function () {
    app()->setLocale('ar');

    $this->get('/')
        ->assertOk()
        ->assertSee('lang="ar" dir="rtl"', false)
        ->assertSee('اعثر على المكان الذي يشبهك.');
});

test('the public layout renders French copy with left-to-right direction', function () {
    app()->setLocale('fr');

    $this->get('/')
        ->assertOk()
        ->assertSee('lang="fr" dir="ltr"', false)
        ->assertSee('Un lieu de vie qui vous ressemble.');
});
