@props([
    'headline'     => '',
    'description'  => '',
    'button_label' => '',
    'button_url'   => '#'
])

<section {{ $attributes->merge(['class' => 'relative px-6 py-16 lg:py-20']) }}>
    <div class="mx-auto max-w-5xl">

        {{-- Card --}}
        <div class="relative overflow-hidden rounded-3xl bg-slate-950 px-8 py-14 sm:px-14 lg:px-20 lg:py-16">

            {{-- Ambient glow --}}
            <div class="pointer-events-none absolute -top-24 -right-24 h-64 w-64 rounded-full bg-violet-600/30 blur-[80px]"></div>
            <div class="pointer-events-none absolute -bottom-16 -left-16 h-48 w-48 rounded-full bg-indigo-600/20 blur-[60px]"></div>

            {{-- Dot grid --}}
            <div class="pointer-events-none absolute inset-0" aria-hidden="true">
                <svg class="h-full w-full opacity-[0.06]" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="cta-grid" width="32" height="32" patternUnits="userSpaceOnUse">
                            <circle cx="1" cy="1" r="1" fill="white" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#cta-grid)" />
                </svg>
            </div>

            {{-- Top accent --}}
            <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-violet-500/40 to-transparent"></div>

            <div class="relative flex flex-col items-start gap-8 lg:flex-row lg:items-center lg:justify-between">
                <div class="max-w-xl">
                    {{-- Label --}}
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1">
                        <div class="h-1.5 w-1.5 rounded-full bg-violet-400"></div>
                        <span class="text-[11px] font-semibold uppercase tracking-widest text-violet-300">Get started</span>
                    </div>

                    @if($headline)
                        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl leading-[1.1]">
                            {{ $headline }}
                        </h2>
                    @endif
                    @if($description)
                        <p class="mt-4 text-base leading-relaxed text-white/50">{{ $description }}</p>
                    @endif
                </div>

                @if($button_label)
                    <div class="flex-shrink-0">
                        <a href="{{ $button_url }}"
                           class="group inline-flex items-center gap-2.5 rounded-full bg-white px-8 py-4 text-sm font-semibold text-slate-900 shadow-lg shadow-white/10 transition-all duration-200 hover:bg-slate-100 hover:shadow-white/20 hover:scale-[1.02]">
                            {{ $button_label }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-200 group-hover:translate-x-0.5" aria-hidden="true">
                                <path d="M5 12h14" /><path d="m12 5 7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>
