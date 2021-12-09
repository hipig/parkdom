<footer class="flex flex-none items-center bg-white">
    <div
        class="text-center flex flex-col md:text-left md:flex-row md:justify-between text-sm max-w-10xl mx-auto px-4 lg:px-8 w-full">
        <div class="pt-4 pb-1 md:pb-4">
            <a href="#" target="_blank"
               class="font-medium text-indigo-600 hover:text-indigo-400">{{ config('app.name') }}</a> © 2021
        </div>
        <div class="pb-4 pt-1 md:pt-4 inline-flex items-center justify-center">
            {!! __('Crafted with by ❤ :name', ['name' => '<a href="#" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-400 mx-1">hipig</a>']) !!}
        </div>
    </div>
</footer>
