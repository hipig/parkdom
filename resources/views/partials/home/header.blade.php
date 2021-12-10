<header id="page-header" class="flex flex-none items-center bg-white shadow-sm z-1 bg-indigo-500 relative">
    <div class="absolute right-0 inset-y-0 flex items-center px-8">
        <button type="button" x-data @click="$dispatch('change-language-dialog-show', { show: true })" class="inline-flex items-center text-white space-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-50" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.02.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z" clip-rule="evenodd" />
            </svg>
            <span class="font-medium text-sm">{{ config('app.locales')[config('app.locale')] }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div class="container xl:max-w-7xl mx-auto px-4 lg:px-8">
        <div class="flex justify-between py-4">
            <!-- Left Section -->
            <div class="flex items-center space-x-4 lg:space-x-8">
                <!-- Logo -->
                <a href="javascript:void(0)" class="group inline-flex items-center space-x-2 font-bold text-lg tracking-wide text-white hover:text-indigo-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                    <span>{{ config('app.name') }}</span>
                </a>
                <!-- END Logo -->

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex lg:items-center lg:space-x-4">
                    <a href="javascript:void(0)" class="font-medium flex items-center space-x-2 px-3 py-2 text-white">
                        <span>Domains</span>
                    </a>

                    <a href="javascript:void(0)" class="font-medium flex items-center space-x-2 px-3 py-2 text-indigo-100 hover:text-white">
                        <span>Pricing</span>
                    </a>
                    <a href="javascript:void(0)" class="font-medium flex items-center space-x-2 px-3 py-2 text-indigo-100 hover:text-white">
                        <span>About</span>
                    </a>
                </nav>
                <!-- END Desktop Navigation -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="flex items-center space-x-1 lg:space-x-2">
                <button type="button" @click="closeDialog" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-transparent text-white hover:text-indigo-50">
                    <span>{{ __('Login') }}</span>
                </button>
                <a href="{{ route('login') }}" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-white bg-transparent hover:text-indigo-50 text-white shadow-sm">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 -mx-px"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    <span>Start Parking</span>
                </a>

                <!-- Toggle Mobile Navigation -->
                <div class="lg:hidden">
                    <button type="button" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-6 rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="hi-solid hi-menu inline-block w-5 h-5"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <!-- END Toggle Mobile Navigation -->
            </div>
            <!-- END Right Section -->
        </div>

        <!-- Mobile Navigation -->
        <!--
          Visibility
            Closed        'hidden'
            Opened        '' (no class)
        -->
        <div class="lg:hidden">
            <nav class="flex flex-col space-y-2 py-4 border-t">
                <a href="javascript:void(0)" class="text-sm font-medium flex items-center space-x-2 px-3 py-2 rounded border border-indigo-50 bg-indigo-50 text-indigo-500">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="opacity-50 hi-solid hi-home inline-block w-5 h-5"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    <span>Dashboard</span>
                </a>
                <a href="javascript:void(0)" class="text-sm font-medium flex items-center space-x-2 px-3 py-2 rounded text-gray-600 border border-transparent hover:text-indigo-500 hover:bg-indigo-50 hover:border-indigo-50 active:bg-indigo-100 active:border-indigo-100">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="opacity-50 hi-solid hi-briefcase inline-block w-5 h-5"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                    <span>Projects</span>
                </a>
                <a href="javascript:void(0)" class="text-sm font-medium flex items-center space-x-2 px-3 py-2 rounded text-gray-600 border border-transparent hover:text-indigo-500 hover:bg-indigo-50 hover:border-indigo-50 active:bg-indigo-100 active:border-indigo-100">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="opacity-50 hi-solid hi-users inline-block w-5 h-5"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
                    <span>Users</span>
                </a>
                <a href="javascript:void(0)" class="text-sm font-medium flex items-center space-x-2 px-3 py-2 rounded text-gray-600 border border-transparent hover:text-indigo-500 hover:bg-indigo-50 hover:border-indigo-50 active:bg-indigo-100 active:border-indigo-100">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="opacity-50 hi-solid hi-document-text inline-block w-5 h-5"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                    <span>Invoices</span>
                </a>
            </nav>
        </div>
        <!-- END Mobile Navigation -->
    </div>
</header>
<header class="bg-indigo-500 hidden">
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
                <a href="{{ route('login') }}" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-white bg-transparent text-white shadow-sm">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 -mx-px"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    <span>Start Parking</span>
                </a>
            </div>
        </div>
    </div>
</header>
