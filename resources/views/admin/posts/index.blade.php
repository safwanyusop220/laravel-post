
<x-layout>

    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            Manage Posts
        </h1>

        <div class="flex">
            <aside class="w-48 flex-shrink-0">
                <h4 class="font-semibold mb-4">Links</h4>
                <ul>
                    <li>
                        <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts</a>
                    </li>

                    <li>
                        <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                    </li>
                </ul>
            </aside>

            <main class="flex-1">
                <x-panel>
                    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                        @csrf

                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                <a href="/posts/{{ $post->slug }}">
                                                                    {{ $post->title }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                      Published
                                                    </span>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{ route('post.edit', $post) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                                        <form method="POST" action="{{ route('post.destroy', $post) }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="text-xs text-gray-400" onclick="return confirm('Are you sure?')">Delete</button>

                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            <!-- More people... -->
                                            </tbody>
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
