@props([
    'template' => 'docs',
    'data' => [],
])

@php
    $view = config('blade-ssg.templates.'.$template.'.view');
@endphp

<{{ $view }} :content="$content" :data="$data['pages']">
    {!! $content !!}
</{{ $view }}>
