@props([
    'template' => 'docs',
    'data' => [],
])

@if ($template === 'docs')
    <x-blade-ssg::docs.layout :content="$content" :pages="$data['pages']">
        {!! $content !!}
    </x-blade-ssg::docs.layout>
@endif
