<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ __('ui.meta.description') }}">
        <meta name="theme-color" content="#FAF9F6">

        <title>@yield('title', __('ui.meta.title'))</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen">
        <a
            class="sr-only focus:not-sr-only focus:fixed focus:start-4 focus:top-4 focus:z-50 focus:rounded-md focus:bg-white focus:px-4 focus:py-3 focus:text-primary focus:shadow-lg"
            href="#main-content"
        >
            {{ __('ui.navigation.skip_to_content') }}
        </a>

        <header class="relative z-20 border-b border-border bg-background" x-data="{ menuOpen: false }">
            <x-ui.container>
                <div class="flex min-h-20 items-center justify-between gap-6">
                    <a class="shrink-0 text-xl font-semibold tracking-tight text-primary sm:text-2xl" href="/">
                        Dar<span class="text-accent">.</span>
                        <span class="sr-only">{{ __('ui.navigation.home') }}</span>
                    </a>

                    <nav class="hidden items-center gap-8 md:flex" aria-label="{{ __('ui.navigation.primary') }}">
                        <x-ui.nav-link href="#selection">{{ __('ui.navigation.properties') }}</x-ui.nav-link>
                        <x-ui.nav-link href="#approach">{{ __('ui.navigation.about') }}</x-ui.nav-link>
                    </nav>

                    <div class="hidden md:block">
                        <x-ui.button href="#contact" variant="outline">
                            {{ __('ui.navigation.contact') }}
                        </x-ui.button>
                    </div>

                    <button
                        class="inline-flex size-11 items-center justify-center rounded-full border border-border text-primary transition-colors hover:bg-secondary focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary md:hidden"
                        type="button"
                        x-bind:aria-expanded="menuOpen"
                        aria-controls="mobile-navigation"
                        aria-label="{{ __('ui.navigation.toggle') }}"
                        x-on:click="menuOpen = ! menuOpen"
                        x-on:keydown.escape.window="menuOpen = false"
                    >
                        <svg aria-hidden="true" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path x-show="! menuOpen" stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16" />
                            <path x-cloak x-show="menuOpen" stroke-linecap="round" stroke-linejoin="round" d="m6 6 12 12M18 6 6 18" />
                        </svg>
                    </button>
                </div>

                <nav
                    id="mobile-navigation"
                    class="border-t border-border py-4 md:hidden"
                    aria-label="{{ __('ui.navigation.mobile') }}"
                    x-cloak
                    x-show="menuOpen"
                    x-on:click.outside="menuOpen = false"
                >
                    <div class="flex flex-col items-start gap-4">
                        <x-ui.nav-link href="#selection" x-on:click="menuOpen = false">
                            {{ __('ui.navigation.properties') }}
                        </x-ui.nav-link>
                        <x-ui.nav-link href="#approach" x-on:click="menuOpen = false">
                            {{ __('ui.navigation.about') }}
                        </x-ui.nav-link>
                        <x-ui.nav-link href="#contact" x-on:click="menuOpen = false">
                            {{ __('ui.navigation.contact') }}
                        </x-ui.nav-link>
                    </div>
                </nav>
            </x-ui.container>
        </header>

        <main id="main-content">
            @yield('content')
        </main>

        <footer id="contact" class="border-t border-border">
            <x-ui.container>
                <div class="flex flex-col gap-3 py-8 text-sm text-muted sm:flex-row sm:items-center sm:justify-between">
                    <p class="font-medium text-primary">Dar<span class="text-accent">.</span></p>
                    <p>{{ __('ui.footer.caption') }}</p>
                </div>
            </x-ui.container>
        </footer>
    </body>
</html>
