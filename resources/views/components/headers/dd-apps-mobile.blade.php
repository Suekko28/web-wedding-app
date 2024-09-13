<!--  Mobilenavbar -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <nav class="sidebar-nav scroll-sidebar">
        <div class="offcanvas-header justify-content-between">
            <img src="{{  asset('img/logo.png') }}" alt="modernize-img" class="img-fluid" />
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body h-n80" data-simplebar="" data-simplebar>
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow {{ request()->is('wedding-design1', 'wedding-design2', 'wedding-design3') ? 'in' : '' }}"
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
                                href="{{ route('wedding-design1.index') }}" aria-expanded="false">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Design 1</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('wedding-design2.index') }}"
                                class="sidebar-link {{ request()->is('wedding-design2') ? 'active' : '' }}">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Design 2</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('wedding-design3.index') }}"
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
                        <a class="sidebar-link {{ request()->is('promo') ? 'active' : '' }}"
                            href="{{ route('promo.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-basket"></i>
                            </span>
                            <span class="hide-menu">Promo</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link {{ request()->is('blog') ? 'active' : '' }}"
                            href="{{ route('blog.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-notes"></i>
                            </span>
                            <span class="hide-menu">Blog</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow {{ request()->is('undangandigital', 'cetakfoto', 'seserahan', 'gambarin') ? 'in' : '' }}"
                            href="javascript:void(0)" aria-expanded="false">
                            <span class="d-flex">
                                <i class="ti ti-chart-donut-3"></i>
                            </span>
                            <span class="hide-menu">Product</span>
                        </a>
                        <ul aria-expanded="false"
                            class="collapse first-level {{ request()->is('undangandigital', 'cetakfoto', 'seserahan', 'gambarin') ? 'in' : '' }}">
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ request()->is('undangandigital') ? 'active' : '' }}"
                                    href="{{ route('undangandigital.index') }}" aria-expanded="false">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Undangan Digital</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('cetakfoto.index') }}"
                                    class="sidebar-link {{ request()->is('cetakfoto') ? 'active' : '' }}">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Cetak Foto</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('seserahan.index') }}"
                                    class="sidebar-link {{ request()->is('seserahan') ? 'active' : '' }}">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Seserahan</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="{{ route('gambarin.index') }}"
                                    class="sidebar-link {{ request()->is('gambarin') ? 'active' : '' }}">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Gambarin</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
