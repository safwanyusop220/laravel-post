
@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
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

                    <x-form.input name="title"/>
                    <x-form.input name="slug"/>
                    <x-form.input name="thumbnail" type="file"/>
                    <x-form.textarea name="excerpt"/>
                    <x-form.textarea name="body"/>

                    <x-form.field>
                        <x-form.label name="category"/>
                        <select name="category_id" id="category_id">
                            @foreach (\App\Models\Category::all() as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                        <X-form.error name="category"/>
                    </x-form.field>


                    <x-form.button>Publish</x-form.button>

                </form>
            </x-panel>
        </main>
    </div>
</section>
