<header class="bg-indigo-500">
    <div class="w-full max-w-7xl mx-auto px-4 py-3 lg:px-8">
        <div class="flex items-center justify-between">
            <a href="javascript:void(0)" class="inline-flex items-center space-x-2 font-bold text-lg tracking-wide text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
                <span>{{ config('app.name') }}</span>
            </a>
            <ul class="hidden lg:flex items-center space-x-10">
                <li>
                    <a href="javascript:void(0)" class="font-semibold inline-flex items-center space-x-1 text-white">
                        <span>Parking Domains</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="font-semibold inline-flex items-center space-x-1 text-white">
                        <span>Pricing</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="font-semibold inline-flex items-center space-x-1 text-white">
                        <span>About</span>
                    </a>
                </li>
            </ul>
            <div class="flex items-center justify-center space-x-1 sm:space-x-4">
                <button type="button" x-data @click="$dispatch('change-language-dialog-show', { show: true })" class="inline-flex items-center text-white space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-50" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.02.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium text-sm">{{ config('app.locales')[config('app.locale')] }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <a href="javascript:void(0)" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-white bg-transparent text-white shadow-sm">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 -mx-px"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    <span>Start Parking</span>
                </a>
            </div>
        </div>
    </div>
</header>
