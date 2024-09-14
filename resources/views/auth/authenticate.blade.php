@php
    $types = [
        'login' => 'Log In',
        'signup' => 'Sign Up',
    ];
    $currentPath = explode('/', request()->path())[0];
    $current = $types[$currentPath];
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $current }}</title>
</head>

<body class="flex items-center justify-center">
    <div class="flex flex-col gap-5 text-gray-600">
        <h1 class="text-gray-800 font-semibold text-sm">{{ $current }}</h1>
        <x-authenticationform :currentPage="$currentPath" :currentPageName="$current"></x-authenticationform>
    </div>
</body>

</html>
