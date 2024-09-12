@php
    $path = request()->path();
    $paths = explode('/', $path);
@endphp

@if (count($paths) > 1 && $path !== '/')
    <a href="{{ '/' . $paths[0] }}" class='text-blue-800 text-xs'><- &nbsp; back to list</a>
@endif
