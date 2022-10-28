<x-layout>

    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Edit Posts For : {{ $post->title }}
        </h1>

        <div class="flex">
            <aside class="w-48 flex-shrink-0">
                <h4 class="font-semibold mb-4">Links</h4>
                <ul>
                    <li>
                        <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All
                            Posts</a>
                    </li>

                    <li>
                        <a href="/admin/posts/create"
                           class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                    </li>
                </ul>
            </aside>

            <main class="flex-1">
                <x-panel>
                    <form method="POST" action="{{ route('post.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mt-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                                Title
                            </label>

                            <input class="border border-gray-200 p-2 w-full rounded"
                                   name="title"
                                   id="title"
                                   value=" {{ $post->title }} "
                            >

                            @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                   for="slug"
                            >
                                Slug
                            </label>

                            <input class="border border-gray-200 p-2 w-full rounded"
                                   name="slug"
                                   id="slug"
                                   value=" {{ $post->slug }} "
                            >

                            @error('slug')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex mt-6">

                            <div class="flex-1">
                                <div class="mt-6">
                                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                           for="thumbnail"
                                    >
                                        Thumbnail
                                    </label>

                                    <input class="border border-gray-200 p-2 w-full rounded"
                                           type="file"
                                           name="thumbnail"
                                           id="thumbnail"
                                           value=" {{ $post->thumbnail }} "
                                    >

                                    @error('thumbnail')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6"
                                 width="200">
                        </div>

                        <div class="mt-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                   for="excerpt"
                            >
                                Excerpt
                            </label>

                            <textarea class="border border-gray-200 p-2 w-full rounded"
                                      type="text"
                                      name="excerpt"
                                      id="excerpt"
                            >{{ $post->excerpt }}</textarea>


                            @error('excerpt')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                   for="body"
                            >
                                body
                            </label>

                            <textarea class="border border-gray-200 p-2 w-full rounded"
                                      type="text"
                                      name="body"
                                      id="body"
                            >{{ $post->body }}</textarea>


                            @error('body')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
                            >
                                Update
                            </button>
                        </div>

                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-panel>
            </main>
        </div>
    </section>
</x-layout>
