@props([
    'heading'     => '',
    'subheading'  => '',
    'image'       => '',
    'cta_label'   => '',
    'cta_url'     => '#',
    'subSections' => []
])

<section {{ $attributes->merge(['class' => 'relative min-h-screen overflow-hidden bg-[#030712] flex items-center']) }}>

    {{-- Ambient glows --}}
    <div class="pointer-events-none absolute -top-40 left-1/2 -translate-x-1/2 w-[900px] h-[600px] rounded-full bg-violet-700/20 blur-[120px]"></div>
    <div class="pointer-events-none absolute bottom-0 right-0 w-[500px] h-[500px] bg-indigo-700/15 blur-[100px]"></div>

    {{-- Dot grid --}}
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="hero-grid" width="32" height="32" patternUnits="userSpaceOnUse">
                    <circle cx="1" cy="1" r="1" fill="rgba(255,255,255,0.06)" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#hero-grid)" />
        </svg>
    </div>

    {{-- Thin top border --}}
    <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-violet-500/50 to-transparent"></div>

    <div class="relative z-10 mx-auto w-full max-w-7xl px-6 py-28 lg:px-8 lg:py-36">

        @if($image)
        {{-- Two-column layout with image --}}
        <div class="flex flex-col items-center gap-16 lg:flex-row lg:items-center lg:gap-20">
            {{-- Left — text --}}
            <div class="flex-1 lg:max-w-2xl">
                <div class="mb-8 inline-flex items-center gap-2.5 rounded-full border border-white/10 bg-white/[0.04] px-4 py-2 backdrop-blur-sm">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-violet-400 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-violet-400"></span>
                    </span>
                    <span class="text-[13px] font-medium tracking-wide text-white/60">Now live</span>
                </div>

                <h1 class="text-[clamp(2.5rem,6vw,5rem)] font-bold leading-[1.04] tracking-[-0.03em] text-white">
                    {{ $heading }}
                </h1>

                @if($subheading)
                    <p class="mt-6 text-lg leading-relaxed text-slate-400 max-w-lg">{{ $subheading }}</p>
                @endif

                @if($cta_label)
                    <div class="mt-10 flex flex-wrap gap-3">
                        <a href="{{ $cta_url }}"
                           class="group inline-flex items-center gap-2 rounded-full bg-white px-7 py-3.5 text-sm font-semibold text-slate-900 shadow-lg shadow-white/10 transition-all duration-200 hover:bg-slate-100 hover:shadow-white/20 hover:scale-[1.02]">
                            {{ $cta_label }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-200 group-hover:translate-x-0.5" aria-hidden="true">
                                <path d="M5 12h14" /><path d="m12 5 7 7-7 7" />
                            </svg>
                        </a>
                        <a href="#"
                           class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/[0.04] px-7 py-3.5 text-sm font-medium text-white/70 backdrop-blur-sm transition-all duration-200 hover:border-white/20 hover:bg-white/[0.08] hover:text-white">
                            Learn more
                        </a>
                    </div>
                @endif
            </div>

            {{-- Right — image --}}
            <div class="flex-1 w-full max-w-xl lg:max-w-none">
                <div class="relative">
                    <div class="absolute -inset-6 rounded-3xl bg-gradient-to-br from-violet-600/25 via-indigo-600/10 to-transparent blur-2xl"></div>
                    <div class="relative overflow-hidden rounded-2xl ring-1 ring-white/10 shadow-[0_32px_80px_rgba(0,0,0,0.6)]">
                        <img src="{{ $image }}" alt="" class="w-full object-cover" />
                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-white/5"></div>
                    </div>
                </div>
            </div>
        </div>

        @else
        {{-- Centered layout without image --}}
        <div class="mx-auto max-w-4xl text-center">
            <div class="mb-8 inline-flex items-center gap-2.5 rounded-full border border-white/10 bg-white/[0.04] px-4 py-2 backdrop-blur-sm">
                <span class="relative flex h-2 w-2">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-violet-400 opacity-75"></span>
                    <span class="relative inline-flex h-2 w-2 rounded-full bg-violet-400"></span>
                </span>
                <span class="text-[13px] font-medium tracking-wide text-white/60">Now live</span>
            </div>

            <h1 class="text-[clamp(2.5rem,6vw,5.5rem)] font-bold leading-[1.04] tracking-[-0.03em] text-white">
                {{ $heading }}
            </h1>

            @if($subheading)
                <p class="mx-auto mt-6 max-w-xl text-lg leading-relaxed text-slate-400">{{ $subheading }}</p>
            @endif

            @if($cta_label)
                <div class="mt-10 flex flex-wrap justify-center gap-3">
                    <a href="{{ $cta_url }}"
                       class="group inline-flex items-center gap-2 rounded-full bg-white px-7 py-3.5 text-sm font-semibold text-slate-900 shadow-lg shadow-white/10 transition-all duration-200 hover:bg-slate-100 hover:scale-[1.02]">
                        {{ $cta_label }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-200 group-hover:translate-x-0.5" aria-hidden="true">
                            <path d="M5 12h14" /><path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>
                    <a href="#"
                       class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/[0.04] px-7 py-3.5 text-sm font-medium text-white/70 backdrop-blur-sm transition-all duration-200 hover:border-white/20 hover:bg-white/[0.08] hover:text-white">
                        Learn more
                    </a>
                </div>
            @endif
        </div>
        @endif

    </div>

    {{-- Bottom fade --}}
    <div class="pointer-events-none absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-[#030712] to-transparent"></div>

</section>
