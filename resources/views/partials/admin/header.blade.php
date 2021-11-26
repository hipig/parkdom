<header
    id="page-header"
    class="flex flex-none items-center h-16 bg-white shadow-sm fixed top-0 right-0 left-0 z-30"
    x-bind:class="{
      'lg:pl-64': desktopSidebarOpen
    }"
>
    <div class="flex justify-between max-w-7xl mx-auto px-4 lg:px-8 w-full">
        <div class="flex items-center space-x-2">
            <div class="hidden lg:block">
                <button
                    type="button"
                    class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-6 rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none"
                    x-on:click="desktopSidebarOpen = !desktopSidebarOpen"
                >
                    <svg class="hi-solid hi-menu-alt-1 inline-block w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>

            <div class="lg:hidden">
                <button
                    type="button"
                    class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-6 rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none"
                    x-on:click="mobileSidebarOpen = true"
                >
                    <x-heroicon-s-menu-alt-1 class="w-5 h-5"></x-heroicon-s-menu-alt-1>
                </button>
            </div>
        </div>

        <div class="flex items-center space-x-3">
            <x-admin.dropdown>
                <button
                    type="button"
                    class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none"
                >
                    <x-heroicon-s-user-circle class="w-5 h-5 text-indigo-500"></x-heroicon-s-user-circle>
                    <span>{{ Auth::user()->name }}</span>
                    <x-heroicon-s-chevron-down class="w-5 h-5 opacity-50"></x-heroicon-s-chevron-down>
                </button>
                <x-slot name="menu">
                    <x-admin.dropdown.menu>
                        <div class="p-2 space-y-1">
                            <x-admin.dropdown.item label="个人资料" icon="heroicon-s-user-circle"
                                                   href="#"></x-admin.dropdown.item>
                            <x-admin.dropdown.item label="系统设置" icon="heroicon-s-cog" href="#"></x-admin.dropdown.item>
                        </div>
                        <div class="p-2 space-y-1">
                            <x-admin.dropdown.item label="退出登录" icon="heroicon-s-lock-closed"
                                                   @click="$refs['logout-form'].submit()"></x-admin.dropdown.item>
                        </div>
                    </x-admin.dropdown.menu>
                    <form x-ref="logout-form" action="{{ route('admin.logout') }}" method="post">
                        @csrf
                    </form>
                </x-slot>
            </x-admin.dropdown>
        </div>
    </div>
</header>
