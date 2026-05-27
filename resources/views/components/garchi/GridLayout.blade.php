@props([
    'cols' => 3,
    'subSections' => []
])

@php
    $lgColsMap = [
        1 => 'lg:grid-cols-1',
        2 => 'lg:grid-cols-2',
        3 => 'lg:grid-cols-3',
        4 => 'lg:grid-cols-4',
        5 => 'lg:grid-cols-5',
    ];
    $n = max(1, min(5, (int) $cols));
    $lgClass = $lgColsMap[$n];
@endphp

<div {{ $attributes->merge(['class' => "grid gap-4 grid-cols-1 md:grid-cols-2 {$lgClass}"]) }}>
    @foreach($subSections as $section)
        <x-garchi.GarchiComponent :section="$section" />
    @endforeach
</div>
