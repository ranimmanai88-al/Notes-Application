<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes With Images') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($notes->isEmpty())
                        <div class="text-center py-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-gray-100">No notes with images found</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Create a note with an image to see it here.</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($notes as $note)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden hover:shadow-md transition">
                                    @if($note->image_path)
                                        <img src="{{ $note->image_url }}" alt="{{ $note->title }}" class="w-full h-48 object-cover">
                                    @endif
                                    <div class="p-4">
                                        <h3 class="font-medium text-gray-900 dark:text-gray-100">{{ $note->title }}</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">{{ Str::limit($note->body, 100) }}</p>
                                        <div class="mt-3 flex justify-between items-center">
                                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $note->created_at->diffForHumans() }}</span>
                                            <a href="{{ route('notes.show', $note) }}" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 text-sm">View</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>