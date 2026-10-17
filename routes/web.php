<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('home', [
    'locale' => app()->getLocale(),
]))->name('home.redirect');

Route::prefix('{locale}')
    ->where(['locale' => implode('|', array_keys(config('localization.locales')))])
    ->group(function (): void {
        Route::get('/', fn () => view('welcome'))->name('home');
    });
