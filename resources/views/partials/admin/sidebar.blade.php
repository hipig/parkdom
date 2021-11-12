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

    <div class="sidebar-scroll-section" data-simplebar>
        <x-admin.sidebar.menu>
            <x-admin.sidebar.item label="仪表盘" icon="heroicon-s-home" href="{{ route('admin.dashboard') }}" :active="if_route_pattern('admin.dashboard')"></x-admin.sidebar.item>
            <x-admin.sidebar.group label="系统">
                <x-admin.sidebar.item label="系统设置" icon="heroicon-s-cog">
                    <x-admin.sidebar.subitem label="基础" href="#"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="域名" href="#"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="报价" href="#"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="邮箱配置" href="#"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="联系方式" href="#"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="验证码" href="#"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="币种" href="#"></x-admin.sidebar.subitem>
                </x-admin.sidebar.item>
                <x-admin.sidebar.item label="模板主题" icon="heroicon-s-cube" href="#"></x-admin.sidebar.item>
                <x-admin.sidebar.item label="本地化" icon="heroicon-s-translate"></x-admin.sidebar.item>
            </x-admin.sidebar.group>
            <x-admin.sidebar.group label="应用">
                <x-admin.sidebar.item label="报价列表" icon="heroicon-s-currency-dollar"></x-admin.sidebar.item>
                <x-admin.sidebar.item label="域名管理" icon="heroicon-s-globe-alt">
                    <x-admin.sidebar.subitem label="导入域名" href="#"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="域名列表" href="#"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="后缀" href="#"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="标签" href="#"></x-admin.sidebar.subitem>
                </x-admin.sidebar.item>
                <x-admin.sidebar.item label="概况统计" icon="heroicon-s-chart-square-bar"></x-admin.sidebar.item>
            </x-admin.sidebar.group>
            <x-admin.sidebar.group label="其他">
                <x-admin.sidebar.item label="单页" icon="heroicon-s-document-text" href="#"></x-admin.sidebar.item>
                <x-admin.sidebar.item label="联系我们" icon="heroicon-s-chat"></x-admin.sidebar.item>
            </x-admin.sidebar.group>
        </x-admin.sidebar.menu>
    </div>
</nav>
