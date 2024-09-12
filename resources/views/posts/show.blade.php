<x-layout>
    <x-header>Post: {{ $post['id'] }}</x-header>
    <div class='px-5 py-3 shadow-md border'>
        <h3 class="text-2xl font-bold">{{ $post['title'] }}</h3>
        <span class="text-sm text-gray-400 font-semibold">{{ $post['author']->name }}</span>
        <p class='text-gray-600 font-medium'>{{ $post['content'] }}</p>
        <ul>
            <span class="text-sm text-yellow-800 underline underline-offset-2"><i
                    class="fa-regular fa-comments"></i>Comments</span>
            @foreach ($post['comments'] as $comment)
                <li class="text-xs text-gray-700">-> {{ $comment->content }} |
                    <span class="text-black">{{ $comment->author->name }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>
