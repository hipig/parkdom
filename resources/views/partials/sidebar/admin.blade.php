@php
    $menus = [
        [
            'label' => __('Dashboard'),
            'icon' => 'heroicon-s-home',
            'href' => route('admin.dashboard'),
            'active' => if_route('admin.dashboard'),
        ],
        __('Main') => [
            [
                'label' => __('Settings'),
                'icon' => 'heroicon-s-cog',
                'active' => if_route_pattern('admin.settings.*'),
                'children' => [
                    [
                        'label' => __('General'),
                        'href' => route('admin.settings.general'),
                        'active' => if_route('admin.settings.general'),
                    ],
                    [
                        'label' => __('Domain'),
                        'href' => route('admin.settings.domain'),
                        'active' => if_route('admin.settings.domain'),
                    ],
                    [
                        'label' => __('Offer'),
                        'href' => route('admin.settings.offer'),
                        'active' => if_route('admin.settings.offer'),
                    ],
                    [
                        'label' => __('Mail'),
                        'href' => route('admin.settings.mail'),
                        'active' => if_route('admin.settings.mail'),
                    ],
                    [
                        'label' => __('Social'),
                        'href' => route('admin.settings.contact'),
                        'active' => if_route('admin.settings.contact'),
                    ],
                ]
            ],
            [
                'label' => __('Domains'),
                'icon' => 'heroicon-s-globe-alt',
                'active' => if_route_pattern(['admin.domains.*', 'admin.domainCategories.*']),
                'children' => [
                    [
                        'label' => __('Categories'),
                        'href' => route('admin.domainCategories.index'),
                        'active' => if_route_pattern('admin.domainCategories.*'),
                    ],
                    [
                        'label' => __('Domains'),
                        'href' => route('admin.domains.index'),
                        'active' => if_route_pattern('admin.domains.*'),
                    ],
                ]
            ],
            [
                'label' => __('Offers'),
                'icon' => 'heroicon-s-currency-dollar',
                'href' => route('admin.offers.index'),
                'active' => if_route_pattern('admin.offers.*')
            ],
            [
                'label' => __('Statistics'),
                'icon' => 'heroicon-s-chart-square-bar',
                'active' => if_route_pattern(['admin.statistics.*', 'admin.domainVisits.*']),
                'children' => [
                    [
                        'label' => __('Domain Visits'),
                        'href' => route('admin.domainVisits.index'),
                        'active' => if_route_pattern('admin.domainVisits.*'),
                    ],
                    [
                        'label' => __('Visit Statistics'),
                        'href' => route('admin.statistics.visit'),
                        'active' => if_route('admin.statistics.visit'),
                    ],
                    [
                        'label' => __('Offer Statistics'),
                        'href' => route('admin.statistics.offer'),
                        'active' => if_route('admin.statistics.offer'),
                    ],
                    [
                        'label' => __('Domain Statistics'),
                        'href' => route('admin.statistics.domain'),
                        'active' => if_route('admin.statistics.domain'),
                    ],
                ]
            ],
        ],
        __('Other') => [
            [
                'label' => __('Languages'),
                'icon' => 'heroicon-s-translate',
                'href' => route('admin.languages.index'),
                'active' => if_route_pattern('admin.languages.*'),
            ],
            [
                'label' => __('Templates'),
                'icon' => 'heroicon-s-cube',
                'badge' => '<span class="px-2.5 py-1 rounded-full text-xs font-medium leading-4 text-yellow-800 bg-yellow-300">Coming</span>',
                'active' => false,
            ],
            [
                'label' => __('Contacts'),
                'icon' => 'heroicon-s-translate',
                'href' => route('admin.contacts.index'),
                'active' => if_route_pattern('admin.contacts.*'),
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
