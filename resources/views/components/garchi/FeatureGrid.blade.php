@props([
    'section_title'    => '',
    'section_subtitle' => '',
    'subSections'      => []
])

<section {{ $attributes->merge(['class' => 'relative py-24 px-6 bg-white lg:py-32']) }}>

    {{-- Subtle radial background --}}
    <div class="pointer-events-none absolute inset-0" style="background: radial-gradient(ellipse 80% 50% at 50% -20%, rgba(139,92,246,0.04), transparent);"></div>

    <div class="relative mx-auto max-w-7xl">

        @if($section_title || $section_subtitle)
            <div class="mb-16 text-center">
                @if($section_title)
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-violet-100 bg-violet-50 px-3.5 py-1.5">
                        <div class="h-1.5 w-1.5 rounded-full bg-violet-500"></div>
                        <span class="text-xs font-semibold uppercase tracking-widest text-violet-600">Features</span>
                    </div>
                    <h2 class="text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                        {{ $section_title }}
                    </h2>
                @endif
                @if($section_subtitle)
                    <p class="mx-auto mt-5 max-w-2xl text-lg leading-relaxed text-slate-500">
                        {{ $section_subtitle }}
                    </p>
                @endif
            </div>
        @endif

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($subSections as $section)
                <x-garchi.GarchiComponent :section="$section" />
            @endforeach
        </div>

    </div>
</section>
