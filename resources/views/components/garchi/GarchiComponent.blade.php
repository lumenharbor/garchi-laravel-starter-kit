@props([
'section' => []
])



@if(view()->exists('components.garchi.'.$section->name))
    @include('components.garchi.'.$section->name,
    [...$section->props, 'subSections'=> $section->children])
@endif