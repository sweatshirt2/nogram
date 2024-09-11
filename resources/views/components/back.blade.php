@php
$path = explode('/', request()->path());
@endphp
@if(count($path) === 2)

<a href="{{ '/'.$path[0] }}" class='text-blue-800 text-xs'>back to list</a>

@endif
