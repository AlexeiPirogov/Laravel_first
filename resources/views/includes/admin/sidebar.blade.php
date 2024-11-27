<nav class="mt-2"> <!--begin::Sidebar Menu-->
    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        
        <li class="nav-header">ADMIN PANEL</li>
        <li class="nav-item"> 
            <a href="{{route('admin.post.index')}}" class="nav-link"> 
                <i class="nav-icon bi bi-clipboard-fill"></i>
                <p>
                    POSTS
                    <span class="nav-badge badge text-bg-secondary me-3">{{isset($posts) ? $posts->total() : ''}}</span>
                </p>
            </a>        
        </li>
    </ul> <!--end::Sidebar Menu-->
</nav>