@php
    $menus = [
        [
            'label' => __('Dashboard'),
            'icon' => 'heroicon-s-home',
            'href' => route('dashboard'),
            'active' => if_route('dashboard'),
        ],
        __('Main') => [
            [
                'label' => __('Account'),
                'icon' => 'heroicon-s-user-circle',
                'href' => route('account.index'),
                'active' => if_route_pattern('account.*'),
            ],
            [
                'label' => __('Domains'),
                'icon' => 'heroicon-s-globe-alt',
                'href' => route('domains.index'),
                'active' => if_route_pattern('domains.*'),
            ],
            [
                'label' => __('Offers'),
                'icon' => 'heroicon-s-currency-dollar',
                'href' => route('admin.offers.index'),
                'active' => if_route_pattern('admin.offers.*')
            ],
            [
                'label' => __('Pages'),
                'icon' => 'heroicon-s-document-text',
                'href' => '',
                'active' => false,
            ],
        ],
    ];
@endphp


<x-admin.sidebar.menu>
    @foreach($menus as $label => $menu)
        @if(is_string($label))
            <x-admin.sidebar.group label="{{ $label }}">
                @foreach($menu as $menuItem)
                    <x-admin.sidebar.item label="{{ $menuItem['label'] }}" icon="{{ $menuItem['icon'] ?? null }}" href="{{ $menuItem['href'] ?? null }}" :active="$menuItem['active']">
                        @if(isset($menuItem['badge']))
                            <x-slot name="badge">
                                {!! $menuItem['badge'] !!}
                            </x-slot>
                        @endif
                        @if(isset($menuItem['children']))
                            @foreach($menuItem['children'] as $subMenu)
                                <x-admin.sidebar.subitem label="{{ $subMenu['label'] }}" href="{{ $subMenu['href'] ?? null }}" :active="$subMenu['active']"></x-admin.sidebar.subitem>
                            @endforeach
                        @endif
                    </x-admin.sidebar.item>
                @endforeach
            </x-admin.sidebar.group>
        @else
            <x-admin.sidebar.item label="{{ $menu['label'] }}" icon="{{ $menu['icon'] ?? null }}" href="{{ $menu['href'] ?? null }}" :active="$menu['active']">
                @if(isset($menu['badge']))
                    <x-slot name="badge">
                        {!! $menu['badge'] !!}
                    </x-slot>
                @endif
                @if(isset($menu['children']))
                    @foreach($menu['children'] as $subMenu)
                        <x-admin.sidebar.subitem label="{{ $subMenu['label'] }}" href="{{ $subMenu['href'] ?? null }}" :active="$subMenu['active']"></x-admin.sidebar.subitem>
                    @endforeach
                @endif
            </x-admin.sidebar.item>
        @endif
    @endforeach
</x-admin.sidebar.menu>
