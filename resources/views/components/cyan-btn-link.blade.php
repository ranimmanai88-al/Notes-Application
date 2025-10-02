<a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-cyan-600 dark:hover:bg-cyan-700'
]) }}>
    {{ $slot }}
</a>