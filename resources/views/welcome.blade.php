@extends('layouts.public')

@section('content')
    <section id="selection" class="py-section">
        <x-ui.container>
            <div class="grid items-center gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:gap-16">
                <div class="max-w-xl">
                    <x-ui.badge variant="accent">{{ __('ui.home.eyebrow') }}</x-ui.badge>

                    <h1 class="mt-6 text-4xl font-medium leading-tight tracking-tight text-primary sm:text-5xl lg:text-6xl">
                        {{ __('ui.home.title') }}
                    </h1>

                    <p class="mt-6 max-w-lg text-base leading-8 text-muted sm:text-lg">
                        {{ __('ui.home.introduction') }}
                    </p>

                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        <x-ui.button href="#approach">
                            {{ __('ui.home.primary_action') }}
                        </x-ui.button>
                        <x-ui.button href="#contact" variant="text">
                            {{ __('ui.home.secondary_action') }}
                        </x-ui.button>
                    </div>

                    <div id="approach" class="mt-12 border-s-2 border-accent ps-5">
                        <p class="text-sm font-medium leading-6 text-text">
                            {{ __('ui.home.note') }}
                        </p>
                    </div>
                </div>

                <figure class="relative">
                    <div class="overflow-hidden rounded-2xl bg-secondary">
                        <img
                            class="aspect-[4/3] w-full object-cover"
                            src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&amp;fit=crop&amp;w=1800&amp;q=85"
                            alt="{{ __('ui.home.image_alt') }}"
                            fetchpriority="high"
                        >
                    </div>
                    <figcaption class="mt-3 text-xs tracking-wide text-muted">
                        {{ __('ui.home.image_caption') }}
                    </figcaption>
                </figure>
            </div>
        </x-ui.container>
    </section>
@endsection
