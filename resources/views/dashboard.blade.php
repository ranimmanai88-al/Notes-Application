<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard - Notes App') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-pink-50 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <div class="text-pink-600 dark:text-gray-400 text-sm">Total Notes</div>
                    <div class="text-2xl font-bold dark:text-white">{{ DB::table('notes')->count() }}</div>
                </div>
                <div class="bg-blue-50 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <div class="text-blue-600 dark:text-gray-400 text-sm">This Week</div>
                    <div class="text-2xl font-bold dark:text-white">{{ DB::table('notes')->where('created_at', '>=', now()->startOfWeek())->count() }}</div>
                </div>
                <div class="bg-orange-50 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <div class="text-orange-600 dark:text-gray-400 text-sm">Categories</div>
                    <div class="text-2xl font-bold dark:text-white">{{ DB::table('notes')->distinct('category')->count('category') }}</div>
                </div>
                <div class="bg-yellow-50 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <div class="text-yellow-600 dark:text-gray-400 text-sm">Pinned Notes</div>
                    <div class="text-2xl font-bold dark:text-white">{{ DB::table('notes')->where('status', 'Pinned')->count() }}</div>
                </div>
            </div>

            <!-- Recent Notes and Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Notes -->
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100"> Notes</h3>
                            <a href="{{ route('notes.create') }}" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 text-sm">+ New Note</a>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Note 1 -->
                            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                <div class="flex justify-between">
                                    <h4 class="font-medium text-gray-900 dark:text-gray-100">First Title Post</h4>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">2025-05-13 21:07:41</span>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Topics: first body post ...</p>
                                <div class="flex mt-2 space-x-2">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full dark:bg-blue-900 dark:text-blue-200">Work</span>
                                    <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Note 2 -->
                            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                <div class="flex justify-between">
                                    <h4 class="font-medium text-gray-900 dark:text-gray-100">Second Title Post</h4>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">2025-05-13 21:13:39</span>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Topics: second body post...</p>
                                <div class="flex mt-2 space-x-2">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full dark:bg-green-900 dark:text-green-200">Blog</span>
                                    <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <!-- Note 3 -->

                            <div class="pb-2">
                                <div class="flex justify-between">
                                    <h4 class="font-medium text-gray-900 dark:text-gray-100">Third Title Post</h4>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">2025-05-13 21:17:34</span>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Topics : third body post...</p>
                                <div class="flex mt-2 space-x-2">
                                    <span class="px-2 py-1 bg-pink-100 text-pink-800 text-xs rounded-full dark:bg-pink-900 dark:text-pink-200">Personal</span>
                                    <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <hr>
                            <!-- Note 4 -->
                            <div class="pb-2">
                                <div class="flex justify-between">
                                    <h4 class="font-medium text-gray-900 dark:text-gray-100">Fourth Title Post</h4>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">2025-05-13 21:22:09</span>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Topics : fourth body post...</p>
                                <div class="flex mt-2 space-x-2">
                                    <span class="px-2 py-1 bg-orange-100 text-orange-800 text-xs rounded-full dark:bg-orange-900 dark:text-orange-200">Important</span>
                                    <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        
                        
                        <div class="mt-4 text-center">
                            <a href="{{ route('notes.index') }}" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 text-sm">View All Notes →</a>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions and Categories -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('notes.create') }}" class="flex items-center p-3 bg-pink-50 dark:bg-gray-700 rounded-lg hover:bg-pink-100 dark:hover:bg-gray-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                <span>New Note</span>
                            </a>
                           

     <!-- Export Notes avec menu déroulant -->
<div class="relative group">
    <button class="flex items-center w-full p-3 bg-blue-50 dark:bg-gray-700 rounded-lg hover:bg-blue-100 dark:hover:bg-gray-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
        </svg>
        <span class="flex-1 text-left">Export Notes</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-400 transform group-hover:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    
    <!-- Menu déroulant -->
    <div class="absolute z-10 hidden group-hover:block bg-white dark:bg-gray-800 shadow-lg rounded-md mt-1 w-full">
        <a href="{{ route('notes.export.pdf') }}" 
           class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700">
            <svg class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Export as PDF
        </a>
        <a href="{{ route('notes.export.excel') }}" 
           class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700">
            <svg class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Export as Excel
        </a>
    </div>
</div>

 



                           <a href="{{ route('notes.with-images') }}" class="flex items-center p-3 bg-orange-50 dark:bg-gray-700 rounded-lg hover:bg-orange-100 dark:hover:bg-gray-600 transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
    </svg>
    <span>Notes with Images</span>
</a>
                        </div>
                    </div>
                    
                    <!-- Categories -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Categories</h3>
                        </div>
                        <div class="space-y-2">
                            <a href="#" class="flex justify-between items-center p-2 hover:bg-blue-50 dark:hover:bg-gray-700 rounded">
                                <div class="flex items-center">
                                    <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                                    <span>Work</span>
                                </div>
                                <span class="text-xs bg-blue-100 dark:bg-gray-700 px-2 py-1 rounded-full">{{ DB::table('notes')->where('category', 'Work')->count() }}</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-2 hover:bg-pink-50 dark:hover:bg-gray-700 rounded">
                                <div class="flex items-center">
                                    <span class="w-3 h-3 bg-pink-500 rounded-full mr-2"></span>
                                    <span>Personal</span>
                                </div>
                                <span class="text-xs bg-pink-100 dark:bg-gray-700 px-2 py-1 rounded-full">{{ DB::table('notes')->where('category', 'Personal')->count() }}</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-2 hover:bg-purple-50 dark:hover:bg-gray-700 rounded">
                                <div class="flex items-center">
                                    <span class="w-3 h-3 bg-purple-500 rounded-full mr-2"></span>
                                    <span>Ideas</span>
                                </div>
                                <span class="text-xs bg-purple-100 dark:bg-gray-700 px-2 py-1 rounded-full">{{ DB::table('notes')->where('category', 'Personal')->count() }}</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-2 hover:bg-yellow-50 dark:hover:bg-gray-700 rounded">
                                <div class="flex items-center">
                                    <span class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></span>
                                    <span>Blog</span>
                                </div>
                                <span class="text-xs bg-yellow-100 dark:bg-gray-700 px-2 py-1 rounded-full">{{ DB::table('notes')->where('category', 'Blog')->count() }}</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-2 hover:bg-orange-50 dark:hover:bg-gray-700 rounded">
                                <div class="flex items-center">
                                    <span class="w-3 h-3 bg-orange-500 rounded-full mr-2"></span>
                                    <span>Important</span>
                                </div>
                                <span class="text-xs bg-orange-100 dark:bg-gray-700 px-2 py-1 rounded-full">{{ DB::table('notes')->where('category', 'Important')->count() }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pinned Notes -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Pinned Notes</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Pinned Note 1 -->
                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex justify-between">
                                <h4 class="font-medium text-gray-900 dark:text-gray-100">Important Password</h4>
                                <button class="text-yellow-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Admin account: {{ Auth::user()->name }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Email: {{ Auth::user()->email }}</p>
                            <div class="mt-3 flex justify-between items-center">
                                <span class="text-xs text-gray-500 dark:text-gray-400">Modified 2 days ago</span>
                                <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full dark:bg-red-900 dark:text-red-200">Important</span>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>