<?php

use Illuminate\Support\Facades\Validator;

test('the root route redirects to the default Arabic homepage', function () {
    $this->get('/')
        ->assertRedirect('/ar')
        ->assertSessionHas('locale', 'ar');
});

test('localized homepage URLs render the correct language and direction', function () {
    $this->get('/ar')
        ->assertOk()
        ->assertSee('lang="ar" dir="rtl"', false)
        ->assertSee('اعثر على المكان الذي يشبهك.')
        ->assertSee('x-data="{ menuOpen: false }"', false)
        ->assertSee('aria-controls="mobile-navigation"', false)
        ->assertSee('href="'.route('home', ['locale' => 'fr']).'"', false);

    $this->get('/fr')
        ->assertOk()
        ->assertSee('lang="fr" dir="ltr"', false)
        ->assertSee('Un lieu de vie qui vous ressemble.')
        ->assertSee('href="'.route('home', ['locale' => 'ar']).'"', false);

    $this->get('/en')
        ->assertOk()
        ->assertSee('lang="en" dir="ltr"', false)
        ->assertSee('Find a place that feels like it was made for you.');
});

test('the chosen locale is persisted and used by the root route', function () {
    $this->get('/fr')
        ->assertOk()
        ->assertSessionHas('locale', 'fr');

    $this->get('/')
        ->assertRedirect('/fr');

    $this->get('/ar')
        ->assertOk()
        ->assertSessionHas('locale', 'ar');

    $this->get('/')
        ->assertRedirect('/ar');
});

test('unsupported locale prefixes are not routable', function () {
    $this->get('/de')->assertNotFound();
});

test('validation messages and field names use the active locale', function () {
    $this->get('/fr')->assertOk();

    expect(Validator::make([], ['name' => 'required'])->errors()->first('name'))
        ->toBe('Le champ nom est obligatoire.');

    $this->get('/ar')->assertOk();

    expect(Validator::make([], ['name' => 'required'])->errors()->first('name'))
        ->toBe('حقل الاسم مطلوب.');
});
