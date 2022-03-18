<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/cms" class="brand-link">
        <img src="/assets/images/logo.png" alt="CMS" class="brand-image">
        <span class="brand-text font-weight-light">IT Code Fair</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar py-4">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header text-bold">Posts</li>
                {{-- <li class="nav-item">
                    <a href="{{ route('cms.specific-event.index') }}" class="nav-link">
                        <i class="bi bi-calendar-event nav-icon"></i>
                        <p>Specific Event</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('cms.post.category', ['event']) }}" class="nav-link">
                        <i class="bi bi-list-ul nav-icon"></i>
                        <p>News & Events</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cms.post.category', ['challenge']) }}" class="nav-link">
                        <i class="nav-icon bi bi-award"></i>
                        <p>Challenges</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cms.post.category', ['competition']) }}" class="nav-link">
                        <i class="nav-icon bi bi-award"></i>
                        <p>Competitions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cms.post.category', ['industry']) }}" class="nav-link">
                        <i class="nav-icon bi bi-award"></i>
                        <p>For Industry</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cms.post.category', ['for-school']) }}" class="nav-link">
                        <i class="nav-icon bi bi-award"></i>
                        <p>For Secondary School</p>
                    </a>
                </li>

                <li class="nav-header text-bold">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="{!! route('cms.photos.index') !!}" class="nav-link">
                        <i class="nav-icon bi bi-images"></i>
                        <p>Photos & Videos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('cms.galleries.index') !!}" class="nav-link">
                        <i class="nav-icon bi bi-images"></i>
                        <p>Gallery</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('cms.sponsors.index') !!}" class="nav-link">
                        <i class="nav-icon bi bi-share"></i>
                        <p>Sponsor</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('cms.resources.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-folder-symlink"></i>
                        <p>Resources</p>
                    </a>
                </li> --}}
                
                <li class="nav-header text-bold">ABOUT US</li>
                <li class="nav-item">
                    <a href="{{ route('cms.introduction.index') }}" class="nav-link">
                        <i class="bi bi-info-circle nav-icon"></i>
                        <p>Introduction</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cms.teams.index') }}" class="nav-link">
                        <i class="bi bi-person-circle nav-icon"></i>
                        <p>Teams</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cms.testimonials.index') }}" class="nav-link">
                        <i class="bi bi-chat-left-quote nav-icon"></i>
                        <p>Testimonials</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cms.facts.index') }}" class="nav-link">
                        <i class="bi bi-circle nav-icon"></i>
                        <p>CodeFair Facts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('cms.settings') !!}" class="nav-link">
                        <i class="nav-icon bi bi-gear"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('cms.users.index') !!}" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
