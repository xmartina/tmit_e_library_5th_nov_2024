<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
            <img src="<?=$siteUrl?>front_added/logo/logo.png?v=1697959738" alt="site logo" class="light-logo">
            <img src="<?=$siteUrl?>front_added/logo/logo.png?v=1697959738" alt="site logo" class="dark-logo">
            <img src="<?=$siteUrl?>front_added/logo/logo.png?v=1697959738" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Action</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>
                    <span>E-Book</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?=$cms_url?>librarian/view_all_books"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> List E-Books</a>
                    </li>
                    <li>
                        <a href="<?=$siteUrl?>cms/librarian/add_book"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Add E-Book</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add Department</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Add Author</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>