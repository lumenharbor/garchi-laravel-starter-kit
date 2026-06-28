@props([
    'content' => '',
])

@php
    $sanitizedContent = app(\App\Helper\RichTextSanitizer::class)->sanitize($content);
@endphp

<div {{ $attributes->merge(['class' => 'prose max-w-none font-text [&_h1]:font-heading [&_h2]:font-heading [&_h3]:font-heading [&_h4]:font-heading [&_h5]:font-heading [&_h6]:font-heading']) }}>
    {!! $sanitizedContent !!}
</div>
