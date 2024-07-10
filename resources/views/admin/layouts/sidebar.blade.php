<aside id="logo-sidebar" class="dashboard-sidebar">
    <div class="dashboard-sidebar__wrapper">
        <x-modules.sidebar.sidebar-menu>
            <x-modules.sidebar.sidebar-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">
                <x-icons.icon-home/>
                {{ __('title.admin.dashboard') }}
            </x-modules.sidebar.sidebar-link>
        </x-modules.sidebar.sidebar-menu>
        <x-modules.sidebar.sidebar-menu>
            <li class="sidebar-menu-title">{{ __('title.admin.administration') }}</li>
            <x-modules.sidebar.sidebar-link href="" :active="request()->routeIs('admin.users.*')">
                <x-icons.icon-users/>
                {{ __('title.users.index') }}
            </x-modules.sidebar.sidebar-link>
            <x-modules.sidebar.sidebar-link href="" :active="null">
                <x-icons.icon-logs/>
                {{ __('title.logs.index') }}
            </x-modules.sidebar.sidebar-link>
        </x-modules.sidebar.sidebar-menu>
        <x-modules.sidebar.sidebar-menu>
            <li class="sidebar-menu-title">{{ __('title.admin.properties') }}</li>
            <x-modules.sidebar.sidebar-link href="" :active="null">
                <x-icons.icon-categories/>
                {{ __('title.categories.index') }}
            </x-modules.sidebar.sidebar-link>
            <x-modules.sidebar.sidebar-link href="" :active="null">
                <x-icons.icon-news/>
                {{ __('title.articles.index') }}
            </x-modules.sidebar.sidebar-link>
            <x-modules.sidebar.sidebar-link href="" :active="null">
                <x-icons.icon-comments/>
                {{ trans_choice('title.comments.index', 2) }}
            </x-modules.sidebar.sidebar-link>
        </x-modules.sidebar.sidebar-menu>
    </div>
</aside>
