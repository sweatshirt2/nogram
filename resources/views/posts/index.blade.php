<x-layout>
    <section class="mt-6 mb-4 flex justify-between">
        <x-header>Posts</x-header>
        <a href="/posts/create"
            class="border-2 border-blue-600 rounded-sm pt-2 h-10 w-32 text-center
        hover:bg-blue-600 hover:text-white duration-300">
            Create Post
        </a>
    </section>
    <section>
        <div class="grid grid-cols-3 gap-5 mb-12">
            @foreach ($posts as $post)
                <div class="bg-slate-300 p-5">
                    <a href='posts/{{ $post['id'] }}' class='text-blue-800 text-xl p-lg-'>
                        {{ $post['title'] }}
                    </a><br>
                    <span class="text-sm font-light">{{ $post['author']->name }}</span>
                </div>
            @endforeach
        </div>
        {{ $posts->links() }}
    </section>
</x-layout>
