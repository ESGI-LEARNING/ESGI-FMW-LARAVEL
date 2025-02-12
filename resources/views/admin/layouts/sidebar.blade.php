<aside id="logo-sidebar" class="dashboard-sidebar">
    <div class="dashboard-sidebar__wrapper">
        <x-modules.sidebar.sidebar-menu>
            <x-modules.sidebar.sidebar-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">
                <x-icons.icon-home/>
               Dashboard
            </x-modules.sidebar.sidebar-link>
        </x-modules.sidebar.sidebar-menu>
        <x-modules.sidebar.sidebar-menu>
            <li class="sidebar-menu-title">Administration</li>
            <x-modules.sidebar.sidebar-link href="{{ route('admin.users') }}" :active="request()->routeIs('admin.users.*')">
                <x-icons.icon-users/>
                Utilisateurs
            </x-modules.sidebar.sidebar-link>
        </x-modules.sidebar.sidebar-menu>
        <x-modules.sidebar.sidebar-menu>
            <li class="sidebar-menu-title">Propriétés</li>
            <x-modules.sidebar.sidebar-link href="{{ route('admin.categories') }}" :active="request()->routeIs('admin.categories.*')">
                <x-icons.icon-categories/>
                Categories
            </x-modules.sidebar.sidebar-link>
            <x-modules.sidebar.sidebar-link href="{{ route('admin.articles.index') }}" :active="request()->routeIs('admin.articles.*')">
                <x-icons.icon-news/>
                Articles
            </x-modules.sidebar.sidebar-link>
            <x-modules.sidebar.sidebar-link href="{{ route('admin.comments')}}" :active="request()->routeIs('admin.comments.*')">
                <x-icons.icon-comments/>
                Commentaires
            </x-modules.sidebar.sidebar-link>
        </x-modules.sidebar.sidebar-menu>
    </div>
</aside>
