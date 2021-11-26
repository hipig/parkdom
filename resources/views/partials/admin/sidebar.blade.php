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
            <x-admin.sidebar.item label="仪表盘" icon="heroicon-s-home" href="{{ route('admin.dashboard') }}" :active="if_route('admin.dashboard')"></x-admin.sidebar.item>
            <x-admin.sidebar.group label="主要">
                <x-admin.sidebar.item label="系统设置" icon="heroicon-s-cog" :active="if_route_pattern('admin.settings.*')">
                    <x-admin.sidebar.subitem label="基础" href="{{ route('admin.settings.general') }}" :active="if_route('admin.settings.general')"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="域名" href="{{ route('admin.settings.domain') }}" :active="if_route('admin.settings.domain')"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="报价" href="{{ route('admin.settings.offer') }}" :active="if_route('admin.settings.offer')"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="邮箱服务" href="{{ route('admin.settings.mail') }}" :active="if_route('admin.settings.mail')"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="联系方式"  href="{{ route('admin.settings.contact') }}" :active="if_route('admin.settings.contact')"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="验证码" href="#"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="币种" href="{{ route('admin.settings.currencies.index') }}" :active="if_route_pattern('admin.settings.currencies.*')"></x-admin.sidebar.subitem>
                </x-admin.sidebar.item>
                <x-admin.sidebar.item label="域名管理" icon="heroicon-s-globe-alt" :active="if_route_pattern(['admin.domains.*', 'admin.domainCategories.*'])">
                    <x-admin.sidebar.subitem label="分类"  href="{{ route('admin.domainCategories.index') }}" :active="if_route_pattern('admin.domainCategories.*')"></x-admin.sidebar.subitem>
                    <x-admin.sidebar.subitem label="域名列表" href="{{ route('admin.domains.index') }}" :active="if_route_pattern('admin.domains.*')"></x-admin.sidebar.subitem>
                </x-admin.sidebar.item>
                <x-admin.sidebar.item label="报价" icon="heroicon-s-currency-dollar" href="{{ route('admin.offers.index') }}" :active="if_route_pattern('admin.offers.*')"></x-admin.sidebar.item>
                <x-admin.sidebar.item label="概况统计" icon="heroicon-s-chart-square-bar" :active="if_route_pattern(['admin.statistics.*', 'admin.domainVisits.*'])">
                    <x-admin.sidebar.subitem label="访问记录"  href="{{ route('admin.domainVisits.index') }}" :active="if_route_pattern('admin.domainVisits.*')"></x-admin.sidebar.subitem>
                </x-admin.sidebar.item>

            </x-admin.sidebar.group>
            <x-admin.sidebar.group label="其他">
                <x-admin.sidebar.item label="模板主题" icon="heroicon-s-cube" href="#">
                    <x-slot name="badge">
                        <span class="px-2.5 py-1 rounded-full text-xs font-medium leading-4 text-yellow-800 bg-yellow-300">Coming</span>
                    </x-slot>
                </x-admin.sidebar.item>
                <x-admin.sidebar.item label="联系我们" icon="heroicon-s-annotation"></x-admin.sidebar.item>
            </x-admin.sidebar.group>
        </x-admin.sidebar.menu>
    </div>
</nav>
