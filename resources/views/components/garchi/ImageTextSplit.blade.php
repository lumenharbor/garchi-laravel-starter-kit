@props([
    'image'          => '',
    'title'          => '',
    'body'           => '',
    'image_position' => 'left'
])

@php
    $isStacked  = in_array($image_position, ['top', 'bottom']);
    $imageFirst = in_array($image_position, ['left', 'top']);

    $cleanBody = $body
        ? app(\App\Helper\RichTextSanitizer::class)->sanitize($body)
        : '';

    $rowClass = 'flex flex-col gap-14';
    if (!$isStacked) {
        $rowClass .= ' lg:flex-row lg:items-center lg:gap-20';
        if (!$imageFirst) {
            $rowClass .= ' lg:flex-row-reverse';
        }
    }
@endphp

<section {{ $attributes->merge(['class' => 'relative overflow-hidden bg-white py-24 px-6 lg:py-32']) }}>

    {{-- Background decoration --}}
    <div class="pointer-events-none absolute inset-y-0 right-0 w-1/2 bg-slate-50/50"></div>

    <div class="relative mx-auto max-w-7xl">
        <div class="{{ $rowClass }}">

            @if($imageFirst && $image)
                {{-- Image --}}
                <div class="relative {{ $isStacked ? 'w-full' : 'w-full lg:w-1/2' }}">
                    <div class="absolute -inset-4 rounded-3xl bg-gradient-to-br from-violet-100 to-indigo-100 opacity-60 blur-2xl"></div>
                    <div class="relative overflow-hidden rounded-2xl shadow-[0_20px_60px_rgba(0,0,0,0.12)] ring-1 ring-black/5">
                        <img src="{{ $image }}" alt=""
                             class="w-full object-cover transition-transform duration-700 hover:scale-[1.03]"
                             style="min-height: 360px;" />
                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-black/8"></div>
                    </div>
                </div>
            @endif

            {{-- Text --}}
            <div class="flex flex-col justify-center {{ $isStacked ? 'w-full' : 'w-full lg:w-1/2' }}">
                <div class="mb-6 flex items-center gap-3">
                    <div class="h-px w-10 bg-violet-400"></div>
                    <span class="text-xs font-semibold uppercase tracking-widest text-violet-500">Our story</span>
                </div>
                @if($title)
                    <h2 class="text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl leading-[1.1]">
                        {{ $title }}
                    </h2>
                @endif
                @if($cleanBody)
                    <div class="mt-6 prose prose-slate prose-lg max-w-none
                        prose-p:text-slate-500 prose-p:leading-relaxed prose-p:mt-4
                        prose-a:text-violet-600 prose-a:font-medium prose-a:no-underline hover:prose-a:underline
                        prose-strong:text-slate-800 prose-strong:font-semibold
                        prose-li:text-slate-500">
                        {!! $cleanBody !!}
                    </div>
                @endif
            </div>

            @if(!$imageFirst && $image)
                {{-- Image --}}
                <div class="relative {{ $isStacked ? 'w-full' : 'w-full lg:w-1/2' }}">
                    <div class="absolute -inset-4 rounded-3xl bg-gradient-to-br from-violet-100 to-indigo-100 opacity-60 blur-2xl"></div>
                    <div class="relative overflow-hidden rounded-2xl shadow-[0_20px_60px_rgba(0,0,0,0.12)] ring-1 ring-black/5">
                        <img src="{{ $image }}" alt=""
                             class="w-full object-cover transition-transform duration-700 hover:scale-[1.03]"
                             style="min-height: 360px;" />
                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-black/8"></div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>
