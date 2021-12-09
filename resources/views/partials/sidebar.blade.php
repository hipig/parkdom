<nav
    id="page-sidebar"
    class="flex flex-col fixed top-0 left-0 bottom-0 w-full lg:w-64 h-full bg-sidebar-dark text-gray-200 z-50 transform transition-transform duration-500 ease-out"
    x-bind:class="{
      '-translate-x-full': !mobileSidebarOpen,
      'translate-x-0': mobileSidebarOpen,
      'lg:-translate-x-full': !desktopSidebarOpen,
      'lg:translate-x-0': desktopSidebarOpen,
    }"
    aria-label="Main Sidebar Navigation"
>
    <div
        class="h-16 bg-gray-600 bg-opacity-25 flex-none flex items-center justify-between lg:justify-center px-4 w-full">
        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center space-x-2 font-bold text-lg tracking-wide text-white-600 hover:text-white-400 text-white hover:opacity-75">
            <x-heroicon-s-sparkles class="w-6 h-6 text-indigo-400"></x-heroicon-s-sparkles>
            <span>{{ config('app.name') }}</span>
        </a>

        <div class="lg:hidden">
            <button
                type="button"
                class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-transparent text-white opacity-75 hover:opacity-100 focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:opacity-75"
                x-on:click="mobileSidebarOpen = false"
            >
                <x-heroicon-s-x class="w-4 h-4 -mx-1"></x-heroicon-s-x>
            </button>
        </div>
    </div>

    <div class="flex-grow">
        <div class="sidebar-scroll-section" data-simplebar>
            @hasSection('sidebar')
                @yield('sidebar')
            @else
                @include('partials.sidebar.app')
            @endif
        </div>
    </div>

    @if(Auth::user()->isAdmin())
        <div class="p-4 w-full">
            <ul class="text-gray-300 space-y-1">
                <li>
                    <a href="javascript:;" class="flex items-center justify-center space-x-2 px-3 py-2 bg-gray-800 hover:bg-opacity-75 text-white transition ease-out duration-100 rounded">
                        <span class="flex-none flex items-center opacity-75">
                            <x-heroicon-s-user-circle class="w-5 h-5"/>
                        </span>
                        <span class="tex-sm">{{ __('User Dashboard') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    @endif
</nav>
