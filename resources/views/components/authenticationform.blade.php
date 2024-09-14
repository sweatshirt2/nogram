@props(['currentPage', 'currentPageName'])

<form action="{{ '/' . $currentPage }}" method="POST" class="flex flex-col items-center justify-center gap-2">
    @csrf

    @if ($currentPage === 'signup')
        <x-inputgroup fieldname="firstName" placeholder="John">First Name</x-inputgroup>
        <x-inputgroup fieldname="lastName" placeholder="Doe (Optional)">Last Name</x-inputgroup>
    @endif

    <x-inputgroup fieldname="email" placeholder="john@example.com" inputType="email">Email</x-inputgroup>
    @error('email')
    @enderror
    <x-inputgroup fieldname="password" placeholder="" inputType="password">Password</x-inputgroup>

    @if ($currentPage === 'signup')
        <x-inputgroup fieldname="password_confirmation" placeholder="Confirm Password" inputType="password">Confirm
            Password</x-inputgroup>
    @endif
    <button type="submit" class="block">{{ $currentPageName }}</button>
</form>
