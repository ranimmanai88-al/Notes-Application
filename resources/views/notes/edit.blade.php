<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="float-right">
            <a href="{{ route('notes.index') }}"
               class="inline-flex items-center px-4 py-2 
                      bg-indigo-600 dark:bg-indigo-500
                      border border-transparent 
                      rounded-md 
                      font-semibold text-xs text-white dark:text-gray-100 
                      uppercase tracking-widest 
                      hover:bg-indigo-700 dark:hover:bg-indigo-600
                      focus:bg-indigo-700 dark:focus:bg-indigo-600
                      active:bg-indigo-800 dark:active:bg-indigo-700
                      focus:outline-none focus:ring-2 focus:ring-indigo-500 
                      focus:ring-offset-2 dark:focus:ring-offset-gray-800
                      transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                {{ __('Back') }}
            </a>
        </div>
        
        <div class="mt-16"></div> <!-- Espacement amélioré -->
        
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="post" action="{{ route('notes.update', $note) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div>
                        <x-input-label for="title" :value="__('Title')" class="text-indigo-600 dark:text-indigo-400" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" 
                                    :value="old('title', $note->title)" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2 text-red-600 dark:text-red-400" :messages="$errors->get('title')" />
                    </div>

                    <div>
                        <x-input-label for="body" :value="__('Body')" class="text-indigo-600 dark:text-indigo-400" />
                        <textarea id="body" name="body" rows="8" 
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 
                                       focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 rounded-md shadow-sm
                                       transition duration-150 ease-in-out">{{ old('body', $note->body) }}</textarea>
                        <x-input-error class="mt-2 text-red-600 dark:text-red-400" :messages="$errors->get('body')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="category" :value="__('Category')" class="text-indigo-600 dark:text-indigo-400" />
                            <select id="category" name="category" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 
                                         focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="Work" {{ old('category', $note->category) == 'Work' ? 'selected' : '' }}>Work</option>
                                <option value="Personal" {{ old('category', $note->category) == 'Personal' ? 'selected' : '' }}>Personal</option>
                                <option value="Ideas" {{ old('category', $note->category) == 'Ideas' ? 'selected' : '' }}>Ideas</option>
                                <option value="Blog" {{ old('category', $note->category) == 'Important' ? 'selected' : '' }}>Important</option>
                                <option value="Blog" {{ old('category', $note->category) == 'Blog' ? 'selected' : '' }}>Blog</option>
                            </select>
                            <x-input-error class="mt-2 text-red-600 dark:text-red-400" :messages="$errors->get('category')" />
                        </div>

                        <div>
                            <x-input-label for="status" :value="__('Status')" class="text-indigo-600 dark:text-indigo-400" />
                            <select id="status" name="status" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 
                                         focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="Pinned" {{ old('status', $note->status) == 'Pinned' ? 'selected' : '' }}>Pinned</option>
                                <option value="Completed" {{ old('status', $note->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="Incompleted" {{ old('status', $note->status) == 'Incompleted' ? 'selected' : '' }}>Incompleted</option>
                            </select>
                            <x-input-error class="mt-2 text-red-600 dark:text-red-400" :messages="$errors->get('status')" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <x-input-label for="image" :value="__('Note Image')" class="text-indigo-600 dark:text-indigo-400" />
                        <div class="mt-2 flex items-center gap-4">
                            @if($note->image_path)
                                <img src="{{ asset('storage/' . $note->image_path) }}" alt="Current note image" class="h-20 w-20 object-cover rounded-md border border-gray-200 dark:border-gray-600">
                            @endif
                            <x-text-input id="image" type="file" name="image" class="block w-full text-sm text-gray-500 dark:text-gray-400
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-md file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-indigo-50 dark:file:bg-indigo-900/20
                                      file:text-indigo-700 dark:file:text-indigo-300
                                      hover:file:bg-indigo-100 dark:hover:file:bg-indigo-900/30" />
                        </div>
                        <x-input-error class="mt-2 text-red-600 dark:text-red-400" :messages="$errors->get('image')" />
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 px-6 py-3">
                            {{ __('Update Note') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>