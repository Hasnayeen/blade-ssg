<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Documentation') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/hasnayeen/blade-ssg/styles.css') }}">
</head>

<body class="antialiased bg-cream-50">
    <x-blade-ssg::docs.navbar></x-blade-ssg::docs.navbar>
    <div class="grid grid-cols-6 gap-8 pt-8 pb-16 max-w-7xl mx-auto">
        <x-blade-ssg::docs.left-sidebar :pages="$pages"></x-blade-ssg::docs.left-sidebar>
        <main class="col-span-4 prose prose-slate">
            {{ $slot }}
        </main>
        <x-blade-ssg::docs.right-sidebar :content="$content"></x-blade-ssg::docs.right-sidebar>
    </div>
</body>

</html>
