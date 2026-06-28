@props([
    'content' => ''
])

@php
    $clean = app(\App\Helper\RichTextSanitizer::class)->sanitize($content);
@endphp

<section {{ $attributes->merge(['class' => 'py-20 px-6 lg:py-24']) }}>
    <div class="mx-auto max-w-3xl">
        <x-garchi.MarkdownRenderer :content="$clean" />
    </div>
</section>
