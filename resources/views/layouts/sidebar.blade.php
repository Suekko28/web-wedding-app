<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
<div class="brand-logo d-flex align-items-center justify-content-between">
    <a href="/main/index" class="text-nowrap logo-img">
        <img src="{{ URL::asset('build/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
        <img src="{{ URL::asset('build/images/logos/light-logo.svg') }}" class="light-logo" alt="Logo-light" />
    </a>
    <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
        <i class="ti ti-x"></i>
    </a>
</div>

<nav class="sidebar-nav scroll-sidebar" data-simplebar>
    <ul id="sidebarnav">
        <!-- ---------------------------------- -->
        <!-- Home -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/page-pricing') ? 'active' : '' }}" href="{{route('dashboard')}}"
                aria-expanded="false">
                <span>
                    <i class="ti ti-currency-dollar"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow {{ request()->is('main/blog-posts', 'main/blog-detail') ? 'active' : '' }}"
                href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                    <i class="ti ti-chart-donut-3"></i>
                </span>
                <span class="hide-menu">Wedding Design</span>
            </a>
            <ul aria-expanded="false"
                class="collapse first-level {{ request()->is('wedding-design1', 'wedding-design2', 'wedding-design3') ? 'in' : '' }}">
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('wedding-design1') ? 'active' : '' }}"
                        href="{{ route('wedding-design1') }}" aria-expanded="false">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Design 1</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('wedding-design2') }}"
                        class="sidebar-link {{ request()->is('wedding-design2') ? 'active' : '' }}">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Design 2</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('wedding-design3') }}"
                        class="sidebar-link {{ request()->is('wedding-design3') ? 'active' : '' }}">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Design 3</span>
                    </a>
                </li>
            </ul>
        </li>
        @if (auth()->user()->role == 1)
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('promo.index') ? 'active' : '' }}"
                    href="{{route('promo.index')}}" aria-expanded="false">
                    <span>
                        <i class="ti ti-currency-dollar"></i>
                    </span>
                    <span class="hide-menu">Promo</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('blog.index') ? 'active' : '' }}"
                    href="{{route('blog.index')}}" aria-expanded="false">
                    <span>
                        <i class="ti ti-currency-dollar"></i>
                    </span>
                    <span class="hide-menu">Blog</span>
                </a>
            </li>
        @endif

        <!-- ---------------------------------- -->
        <!-- PAGES -->
        <!-- ---------------------------------- -->
    </ul>
</nav>

{{-- <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
    <div class="hstack gap-3">
        <div class="john-img">
            <img src="{{ URL::asset('build/images/profile/user-1.jpg') }}" class="rounded-circle" width="40"
                height="40" alt="modernize-img" />
        </div>
        <div class="john-title">
            <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
            <span class="fs-2">Designer</span>
        </div>
        <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
            <i class="ti ti-power fs-6"></i>
        </button>
    </div>
</div> --}}

<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
