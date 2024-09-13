@props(['current'])

<a href="/{{ $current }}"
    {{ $attributes->merge([
        'class' =>
            'rounded-md px-3 py-2 text-sm font-medium ' .
            (request()->is($current) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'),
    ]) }}>

    {{ $slot }}
</a>
