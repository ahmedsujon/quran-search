<div>
    <div class="app-menu navbar-menu">
        <div class="navbar-brand-box">

            <a href="{{ route('admin.dashboard') }}" class="logo logo-light">

                <span class="logo-lg">
                    <h3 style="color: #fff; padding-top: 20px;">Quran Search</h3>
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}">
                            <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->is('admin/management') || request()->is('admin/management/*') ? 'text-white':'collapsed' }}"
                            href="#sidebarManagement" data-bs-toggle="collapse"
                            aria-expanded="{{ request()->is('admin/management') || request()->is('admin/management/*') ? 'true':'false' }}"
                            role="button" aria-controls="sidebarManagement">
                            <i class="ri-rocket-line"></i> <span data-key="t-landing">Management</span>
                        </a>
                        <div class="menu-dropdown mega-dropdown-menu collapse {{ request()->is('admin/management') || request()->is('admin/management/*') ? 'show':'' }}"
                            id="sidebarManagement">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.adminManagement') }}"
                                                class="nav-link {{ request()->is('admin/management/admins') ? 'active':'' }}"
                                                data-key="t-alerts">Admins</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->is('admin/tools') || request()->is('admin/tools/*') ? 'text-white':'collapsed' }}"
                            href="#sidebarTools" data-bs-toggle="collapse"
                            aria-expanded="{{ request()->is('admin/tools') || request()->is('admin/tools/*') ? 'true':'false' }}"
                            role="button" aria-controls="sidebarTools">
                            <i class="ri-settings-3-line"></i> <span data-key="t-base-ui">Import Data</span>
                        </a>
                        <div class="menu-dropdown mega-dropdown-menu collapse {{ request()->is('admin/tools') || request()->is('admin/tools/*') ? 'show':'' }}"
                            id="sidebarTools">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.suraimport') }}"
                                                class="nav-link {{ request()->is('admin/suraimport') ? 'active':'' }}"
                                                data-key="t-alerts">Sura Ayat Import</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.ayatimport') }}"
                                                class="nav-link {{ request()->is('admin/ayatimport') ? 'active':'' }}"
                                                data-key="t-alerts">Ayat Word Import</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.hadithimport') }}"
                                                class="nav-link {{ request()->is('admin/hadithimport') ? 'active':'' }}"
                                                data-key="t-alerts">Hadith Import</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->is('admin/subject-dropdown-search') || request()->is('admin/subject-dropdown-search/*') ? 'text-white':'collapsed' }}"
                            href="{{ route('admin.subject-dropdown-search') }}">
                            <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Subject Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->is('admin/dropdown-search') || request()->is('admin/dropdown-search/*') ? 'text-white':'collapsed' }}"
                            href="{{ route('admin.dropdown-search') }}">
                            <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Sub-Subject Sub-Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->is('admin/arabic-dropdown-search') || request()->is('admin/arabic-dropdown-search/*') ? 'text-white':'collapsed' }}"
                            href="{{ route('admin.arabic-dropdown-search') }}">
                            <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Arabic Search</span>
                        </a>
                    </li>

                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Basic
                            Settings</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarWebsite" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarWebsite">
                            <i class="ri-settings-3-line"></i> <span data-key="t-base-ui">Website Settings</span>
                        </a>
                        <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarWebsite">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.header.settings') }}" class="nav-link"
                                                data-key="t-alerts">Header Settings</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.footer.settings') }}" class="nav-link"
                                                data-key="t-badges">Footer Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarSetting" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarSetting">
                            <i class="ri-settings-3-line"></i> <span data-key="t-base-ui">Settings</span>
                        </a>
                        <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarSetting">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.profile') }}" class="nav-link"
                                                data-key="t-alerts">Profile</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
        <div class="sidebar-background"></div>
    </div>
</div>