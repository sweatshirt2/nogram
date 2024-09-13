<x-layout>
    <x-header>Post: {{ $post->id }}</x-header>
    <div class='px-5 py-3 shadow-md border'>
        <h3 class="text-2xl font-bold">{{ $post->title }}</h3>
        <span class="text-sm text-gray-400 font-semibold">{{ $post->author->name }}</span>
        <p class='text-gray-600 font-medium'>{{ $post['content'] }}</p>
        <ul>
            <span class="text-sm text-yellow-800 underline underline-offset-2"><i
                    class="fa-regular fa-comments"></i>Comments</span>
            @foreach ($post->comments as $comment)
                <li class="text-xs text-gray-700">-> {{ $comment->content }} |
                    <span class="text-black">{{ $comment->author->name }}</span>
                </li>
            @endforeach
        </ul>
        <div class="flex gap-5 items-center">
            <button
                class="mt-2 bg-gray-300 border border-gray-800 px-4 py-1 text-sm tracking-widest hover:bg-gray-900 hover:text-gray-100 duration-300"><a
                    href="/posts/{{ $post->id }}/edit">Edit</a></button>
            <form method="POST" action="/posts/{{ $post->id }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="mt-2 bg-red-600 border border-white text-white font-semibold px-4 py-1 text-sm tracking-widest hover:bg-white hover:text-red-600 hover:border-red-600 duration-300">
                    Delete</button>
            </form>

        </div>
    </div>
</x-layout>
