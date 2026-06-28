@props([
    'quote'         => '',
    'author_name'   => '',
    'author_role'   => '',
    'author_avatar' => ''
])

@php
    $cleanQuote = $quote
        ? app(\App\Helper\RichTextSanitizer::class)->sanitize($quote)
        : '';
@endphp

<section {{ $attributes->merge(['class' => 'relative overflow-hidden bg-slate-950 py-28 px-6 lg:py-36']) }}>

    {{-- Ambient glow --}}
    <div class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-[600px] w-[800px] rounded-full bg-violet-700/10 blur-[120px]"></div>

    {{-- Grid background --}}
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="testimonial-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.04)" stroke-width="1" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#testimonial-grid)" />
        </svg>
    </div>

    <div class="relative mx-auto max-w-4xl text-center">

        {{-- Stars --}}
        <div class="mb-8 flex justify-center gap-1">
            @for($i = 0; $i < 5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-amber-400" aria-hidden="true">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                </svg>
            @endfor
        </div>

        {{-- Large decorative quote mark --}}
        <div class="pointer-events-none absolute -top-2 left-1/2 -translate-x-1/2 select-none text-[160px] font-serif leading-none text-white/[0.03]" aria-hidden="true">
            &ldquo;
        </div>

        @if($cleanQuote)
            <blockquote class="relative text-[1.35rem] font-medium leading-[1.7] tracking-[-0.01em] text-white/90 sm:text-2xl sm:leading-[1.65]">
                {!! $cleanQuote !!}
            </blockquote>
        @endif

        @if($author_name || $author_role || $author_avatar)
            <figcaption class="mt-10 flex flex-col items-center gap-4">
                {{-- Divider --}}
                <div class="h-px w-16 bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>

                <div class="flex items-center gap-4">
                    @if($author_avatar)
                        <img src="{{ $author_avatar }}" alt="{{ $author_name }}"
                             class="h-12 w-12 rounded-full object-cover ring-2 ring-white/10" />
                    @else
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/8 ring-1 ring-white/10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-white/40" aria-hidden="true">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </div>
                    @endif
                    <div class="text-left">
                        @if($author_name)
                            <p class="text-sm font-semibold text-white">{{ $author_name }}</p>
                        @endif
                        @if($author_role)
                            <p class="text-sm text-white/40">{{ $author_role }}</p>
                        @endif
                    </div>
                </div>
            </figcaption>
        @endif

    </div>

</section>
