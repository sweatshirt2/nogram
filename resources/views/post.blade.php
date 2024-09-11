<x-layout>
  <h1 class='text-2xl font-semibold mb-3'>Post: {{ $post['id'] }}</h1>
  <div class='px-5 py-3 shadow-md border'>
    <h3>{{ $post['title'] }}</h3>
    <p class='text-sm text-gray-600'>{{ $post['content'] }}</p>
  </div>
</x-layout>
