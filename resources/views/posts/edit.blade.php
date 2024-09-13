<x-layout>
    <x-header>Create a post</x-header>
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('PATCH')
        <div>
            <div class="border-b border-gray-900/10 pb-8">

                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title"
                            class="block text-sm underline underline-offset-2 font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" autocomplete="title"
                                class="block flex-1 border-0 bg-transparent p-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                value="{{ $post->title }}" disabled>
                        </div>
                        @error('title')
                            <p class="text-xs text-red-600 underline underline-offset-2 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-span-full mt-2">
                    <label for="content"
                        class="block text-sm underline underline-offset-2 font-medium leading-6 text-gray-900">Content</label>
                    <div class="mt-2">
                        <textarea id="content" name="content" rows="3"
                            class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            required> {{ $post->content }} </textarea>
                    </div>
                    @error('content')
                        <p class="text-xs text-red-600 underline underline-offset-2 mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900"><a
                    href="/posts/{{ $post->id }}">Cancel</a></button>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
    </form>
</x-layout>
