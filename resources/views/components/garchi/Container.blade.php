@props([
    'size' => 'large',
    'subSections' => []
])

@php
    $sizeMap = [
        'small' => 'max-w-md',
        'medium' => 'max-w-xl',
        'large' => 'max-w-3xl',
        'extra large' => 'max-w-7xl',
        'extra-large' => 'max-w-7xl',
    ];
    $maxWidth = $sizeMap[$size] ?? $sizeMap['large'];
@endphp

<div {{ $attributes->merge(['class' => "mx-auto w-full px-4 {$maxWidth}"]) }}>
    @foreach($subSections as $section)
        <x-garchi.GarchiComponent :section="$section" />
    @endforeach
</div>
