<aside>
    @foreach ($pages as $page)
        @php
            $active = request()->is($page->slug);
        @endphp
        @if ($loop->first || $group !== $page->group)
            <h2 @class([
                'text-sm text-slate-700 font-medium mb-2',
                'pt-8' => !$loop->first,
            ])>
                {{ $page->group }}
            </h2>
        @endif
        <a href="{{ url($page->slug) }}" class="block py-2 px-4 hover:text-cream-500 font-semibold border-l {{ $active ? 'text-cream-500' : 'text-gray-500' }}">
            {{ $page->title }}
        </a>
        @php
            $group = $page->group;
        @endphp
    @endforeach
</aside>
