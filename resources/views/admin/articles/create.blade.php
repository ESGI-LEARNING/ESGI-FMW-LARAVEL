<x-admin.admin-layout>
    <x-slot name="title">Admin - Créer un articles</x-slot>

   <div>
       <h1>Créer un article</h1>
   </div>

    <form action="{{ route('admin.articles.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-3 gap-3 mb-3">
            <div>
                <x-modules.form.input-label for="title" value="Titre"/>
                <x-modules.form.text-input name="title" class="w-full" type="text"/>
                <x-modules.form.input-error :messages="$errors->get('title')" class="mt-2"/>
            </div>

            <div>
                <x-modules.form.input-label for="roles" value="Categories"/>
                <x-modules.form.select-input id="tom-select" name="categories[]" class="w-full" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-modules.form.select-input>
                <x-modules.form.input-error :messages="$errors->get('categories')" class="mt-2"/>
            </div>

            <div>
                <x-modules.form.input-toggle name="is_online" label="Est en ligne ?"
                                      :value="old('is_published')"/>
                <x-modules.form.input-error :messages="$errors->get('is_published')" class="mt-2"/>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div>
                <x-modules.form.input-label for="images" value="Images"/>
                <x-modules.form.input-file name="images" class="w-full" multiple/>
                <x-modules.form.input-error :messages="$errors->get('images')" class="mt-2"/>
            </div>
            <div>
                <x-modules.form.input-label for="description" value="Description"/>
                <x-modules.form.input-textaera name="description" class="w-full" rows="5"/>
                <x-modules.form.input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>
        </div>

        <div>
            <x-modules.form.input-label for="content" value="Contenu"/>
            <x-modules.form.input-quilljs class="w-full"/>
            <x-modules.form.input-error :messages="$errors->get('content')" class="mt-2"/>
        </div>

        <div>
            <x-modules.button.primary-button type="submit">
                Créer
            </x-modules.button.primary-button>
        </div>
    </form>
</x-admin.admin-layout>
