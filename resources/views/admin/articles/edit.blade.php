<x-admin.admin-layout>
    <x-slot name="title">Modifier mon articles</x-slot>

    <div>
        <h1>Modifier mon article</h1>
    </div>

    <form action="{{ route('admin.articles.update', ['slug' => $article->slug ]) }}" method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-2 gap-3 mb-3">
            <div>
                <x-modules.form.input-label for="title" value="Titre"/>
                <x-modules.form.text-input name="title" class="w-full" type="text" value="{{ $article->title }}"/>
                <x-modules.form.input-error :messages="$errors->get('title')" class="mt-2"/>
            </div>

            <div>
                <x-modules.form.input-toggle name="is_online" label="Est en ligne ?"
                                             :value="$article->is_published"/>
                <x-modules.form.input-error :messages="$errors->get('is_published')" class="mt-2"/>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-3">
            <div>
                <div class="flex gap-3">
                    @foreach($article->images as $image)
                       <div class="flex items-center flex-col">
                           <img src="{{ $image->path }}" alt="{{ $article->title }}">
                           <x-modules.cta.danger-cta
                               href="{{ route('admin.articles.delete.image', ['id' => $image->id ]) }}"
                           >
                               Supprimer
                           </x-modules.cta.danger-cta>
                       </div>
                    @endforeach
                </div>
                <x-modules.form.input-label for="images" value="Images"/>
                <x-modules.form.input-file name="images[]" class="w-full" multiple value="{{ old('images') }}"/>
                <x-modules.form.input-error :messages="$errors->get('images')" class="mt-2"/>
            </div>

            <div>
                <x-modules.form.input-label for="roles" value="Categories"/>
                <x-modules.form.select-input id="tom-select" name="categories[]" class="w-full" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($article->categories->contains($category->id)) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-modules.form.select-input>
                <x-modules.form.input-error :messages="$errors->get('categories')" class="mt-2"/>
            </div>
        </div>

        <div>
            <x-modules.form.input-label for="description" value="Description"/>
            <x-modules.form.input-textaera name="description" class="w-full" rows="5" value="{{ $article->description }}"/>
            <x-modules.form.input-error :messages="$errors->get('description')" class="mt-2"
                                       />
        </div>

        <div>
            <x-modules.form.input-label for="content" value="Contenu"/>
            <x-modules.form.input-quilljs class="w-full" name="content" value="{{ $article->content }}"/>
            <x-modules.form.input-error :messages="$errors->get('content')" class="mt-2"/>
        </div>

        <div>
            <x-modules.button.primary-button type="submit">
                Modifier
            </x-modules.button.primary-button>
        </div>
    </form>
</x-admin.admin-layout>
