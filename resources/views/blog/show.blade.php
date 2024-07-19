<x-app-layout>
    <x-slot name="title">Blog</x-slot>
    <x-slot name="description">On vous présente l'article {{ $article->title }}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div x-data="{
    slides: [
        @foreach($article->images as $image)
            {
                imgSrc: '{{ $image->path }}',
                imgAlt: '{{ $image->name }}',
            },
        @endforeach
    ],
    currentSlideIndex: 1,
    previous() {
        if (this.currentSlideIndex > 1) {
            this.currentSlideIndex = this.currentSlideIndex - 1
        } else {
            // If it's the first slide, go to the last slide
            this.currentSlideIndex = this.slides.length
        }
    },
    next() {
        if (this.currentSlideIndex < this.slides.length) {
            this.currentSlideIndex = this.currentSlideIndex + 1
        } else {
            // If it's the last slide, go to the first slide
            this.currentSlideIndex = 1
        }
    },
}" class="relative w-full overflow-hidden">

                    <!-- previous button -->
                    <button type="button"
                            class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-slate-700 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:outline-offset-0 dark:bg-slate-900/40 dark:text-slate-300 dark:hover:bg-slate-900/60 dark:focus-visible:outline-blue-600"
                            aria-label="previous slide" x-on:click="previous()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                             stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                        </svg>
                    </button>

                    <!-- next button -->
                    <button type="button"
                            class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-slate-700 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:outline-offset-0 dark:bg-slate-900/40 dark:text-slate-300 dark:hover:bg-slate-900/60 dark:focus-visible:outline-blue-600"
                            aria-label="next slide" x-on:click="next()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                             stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                        </svg>
                    </button>


                    <div class="relative min-h-[75svh] w-full">
                        <template x-for="(slide, index) in slides">
                            <div x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                                 x-transition.opacity.duration.1000ms>
                                <img
                                    class="absolute w-full h-full inset-0 object-cover text-slate-700 dark:text-slate-300"
                                    x-bind:src="slide.imgSrc"
                                    x-bind:alt="slide.imgAlt"
                                />
                            </div>
                        </template>
                    </div>

                    <!-- indicators -->
                    <div
                        class="absolute rounded-xl bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 bg-white/75 px-1.5 py-1 md:px-2 dark:bg-slate-900/75"
                        role="group" aria-label="slides">
                        <template x-for="(slide, index) in slides">
                            <button class="size-2 cursor-pointer rounded-full transition bg-slate-700 dark:bg-slate-300"
                                    x-on:click="currentSlideIndex = index + 1"
                                    x-bind:class="[currentSlideIndex === index + 1 ? 'bg-slate-700 dark:bg-slate-300' : 'bg-slate-700/50 dark:bg-slate-300/50']"
                                    x-bind:aria-label="'slide ' + (index + 1)"></button>
                        </template>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12">
                <div class="col-span-8">
                    <p class="mt-10">
                        {{ $article->content }}

                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet autem beatae cum dicta et ex hic incidunt, ipsa ipsum magni minus natus, nostrum officiis quae rerum similique ullam ut veniam.</span><span>A, aliquid aperiam assumenda beatae dolorum earum facilis magni maxime obcaecati rerum! Aliquam animi eius eum, facere harum, iusto laboriosam neque, nihil officiis perspiciatis qui quibusdam rerum tempora tenetur vitae?</span><span>A aliquid amet commodi corporis dolore doloremque doloribus dolorum eaque, est fuga id ipsa laudantium minima, modi molestiae nam nisi pariatur placeat, porro quae quaerat quisquam reiciendis repudiandae voluptate voluptatem?</span><span>Animi architecto cupiditate deserunt dolorem eligendi eos error eveniet ex facere id in, laboriosam minima nostrum nulla quae, quasi quia unde ut voluptates voluptatum. Blanditiis expedita illo laborum praesentium repellat!</span><span>Adipisci cum expedita facilis inventore iusto officia pariatur praesentium reiciendis repellat vero. Ad architecto dolorem eaque eligendi error esse fuga illum minus nam nisi, officia quas quidem vitae. Minus, sapiente!</span>
                    </p>
                </div>

                <div class="col-span-4 ">
                    <div class="mx-5 mt-10 text-end">
                        <h2 class="text-xl mb-2">Categories</h2>

                        <div class="ml-16 max-w-sm mx-auto">
                            @foreach($article->categories as $category)
                                <div
                                    class="p-3 border-t cursor-pointer text-gray-600 text-end hover:bg-indigo-200 hover:text-indigo-500">
                                    {{ $category->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Comments -->
            <div class="mt-10">
                <h2 class="text-xl mb-2">Comments</h2>
                @auth
                    @livewire('comment.modals.create-comment', ['article_id' => $article->id])
                @endauth
                <div class="max-w-full mx-auto">
                    @foreach($article->comments as $comment)
                        <div class="p-4 bg-white shadow sm:rounded-lg mb-4">
                            <div class="flex justify-between gap-8">
                                <div class="w-full">
                                    <h3 class="font-semibold">{{ $comment->user->name }}</h3>
                                    <div class="mt-1">
                                        <span class="font-bold">{{ $comment->name }}</span>
                                        <span class="text-gray-500">{{ $comment->email }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <span>{{ $comment->content }}</span>
                                    </div>
                                </div>
                                <div class="flex justify-between gap-6 items-center">
                                    <div>
                                        <p>{{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="flex flex-col gap-2 justify-items-center w-full">
                                        @if($comment->user_id === auth()->id())
                                            @livewire('comment.modals.edit-comment', ['comment' => $comment])
                                            @livewire('comment.modals.delete-comment', ['comment' => $comment])

                                            <x-modules.button.icon-button
                                                wire:click="$dispatch('openModal', { component: 'livewire.comment.modals.delete-comment', arguments: { comment: {{ $comment }} }})"
                                            >
                                                <x-icons.icon-delete class="text-red-500"/>
                                            </x-modules.button.icon-button>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
