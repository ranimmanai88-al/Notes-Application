<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
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
        
        <br><br>
        
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="post" action="{{ route('notes.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="title" :value="__('Title')" class="text-indigo-600 dark:text-indigo-400" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" 
                                      :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2 text-red-600 dark:text-red-400" :messages="$errors->get('title')" />
                    </div>

                    <div>
                        <x-input-label for="body" :value="__('Body')" class="text-indigo-600 dark:text-indigo-400" />
                        <textarea id="body" name="body" rows="5" 
                                  class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 
                                         focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('body') }}</textarea>
                        <x-input-error class="mt-2 text-red-600 dark:text-red-400" :messages="$errors->get('body')" />
                    </div>

                    <div>
                        <x-input-label for="category" :value="__('Category')" class="text-indigo-600 dark:text-indigo-400" />
                        <x-text-input id="category" name="category" type="text" class="mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" 
                                      :value="old('category')" required autofocus autocomplete="category" />
                        <x-input-error class="mt-2 text-red-600 dark:text-red-400" :messages="$errors->get('category')" />
                    </div>

                    <div>
                        <x-input-label for="status" :value="__('Status')" class="text-indigo-600 dark:text-indigo-400" />
                        <select id="status" name="status" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 
                                         focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="Pinned" {{ old('status') == 'Pinned' ? 'selected' : '' }}>Pinned</option>
                            <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="Incompleted" {{ old('status') == 'Incompleted' ? 'selected' : '' }}>Incompleted</option>
                        </select>
                        <x-input-error class="mt-2 text-red-600 dark:text-red-400" :messages="$errors->get('status')" />
                    </div>

                   




<div class="mt-6">
    <x-input-label for="image" :value="__('Note Image')" class="text-indigo-600 dark:text-indigo-400 mb-2" />
    
    <div class="flex items-center justify-center w-full">
        <label for="image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed rounded-lg cursor-pointer 
                                  border-gray-300 dark:border-gray-600 hover:border-indigo-500 dark:hover:border-indigo-400
                                  bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                  transition-all duration-200 ease-in-out">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-3 text-indigo-500 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-semibold text-indigo-600 dark:text-indigo-400">Click to upload</span> or drag and drop
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF (MAX. 2MB)</p>
            </div>
            <x-text-input id="image" type="file" class="hidden" name="image" />
        </label>
    </div>
    
    <!-- Preview container (will be shown when image is selected) -->
    <div id="image-preview" class="mt-4 hidden">
        <img id="preview-image" class="max-h-48 rounded-lg border border-gray-200 dark:border-gray-600" src="#" alt="Preview" />
        <button type="button" id="remove-image" class="mt-2 text-sm text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">
            Remove image
        </button>
    </div>
    
    <x-input-error :messages="$errors->get('image')" class="mt-2 text-red-600 dark:text-red-400" />
</div>






                    <div class="flex items-center gap-4">
                        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>



<script>
    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const previewContainer = document.getElementById('image-preview');
        const previewImage = document.getElementById('preview-image');
        const file = e.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }
            
            reader.readAsDataURL(file);
        }
    });
    
    // Remove image functionality
    document.getElementById('remove-image')?.addEventListener('click', function() {
        document.getElementById('image').value = '';
        document.getElementById('image-preview').classList.add('hidden');
    });
</script>