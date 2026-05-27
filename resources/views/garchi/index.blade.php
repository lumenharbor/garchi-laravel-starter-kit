<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$page->title ?? 'Garchi Page'}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <main>
        @foreach($page->sections ?? [] as $section)
        <x-garchi.GarchiComponent :section="$section" />
        @endforeach
    </main>
    <script src="https://garchi.co.uk/script/index.es.js"></script>
</body>

</html>