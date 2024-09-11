<x-layout>
  <h1 class='text-2xl font-semibold mb-3'>Posts</h1>
  <section>
    @foreach($posts as $post)
    <li><a href='posts/{{ $post['id'] }}' class='text-blue-800 text-xl'>{{ $post['title'] }}</a></li>
    @endforeach
  </section>
</x-layout>
