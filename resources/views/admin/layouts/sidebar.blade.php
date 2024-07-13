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
            <x-modules.sidebar.sidebar-link href="{{ route('admin.users') }}" :active="request()->routeIs('admin.users.*')">
                <x-icons.icon-users/>
                Utilisateurs
            </x-modules.sidebar.sidebar-link>
            <x-modules.sidebar.sidebar-link href="" :active="null">
                <x-icons.icon-logs/>
                Logs
            </x-modules.sidebar.sidebar-link>
        </x-modules.sidebar.sidebar-menu>
        <x-modules.sidebar.sidebar-menu>
            <li class="sidebar-menu-title">{{ __('title.admin.properties') }}</li>
            <x-modules.sidebar.sidebar-link href="{{ route('admin.categories') }}" :active="request()->routeIs('admin.categories.*')">
                <x-icons.icon-categories/>
                Categories
            </x-modules.sidebar.sidebar-link>
            <x-modules.sidebar.sidebar-link href="" :active="null">
                <x-icons.icon-news/>
                Articles
            </x-modules.sidebar.sidebar-link>
            <x-modules.sidebar.sidebar-link href="" :active="null">
                <x-icons.icon-comments/>
                Commentaires
            </x-modules.sidebar.sidebar-link>
        </x-modules.sidebar.sidebar-menu>
    </div>
</aside>
