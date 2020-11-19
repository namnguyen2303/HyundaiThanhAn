<div class="app-sidebar sidebar-shadow">
    {{-- <div class="app-header__logo">
        <div class=""></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div> --}}
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>

    @php($routeName = Route::currentRouteName())
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <!-- <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="@if ($routeName == 'admin.dashboard') mm-active @endif">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Bảng điều khiển thống kê
                    </a>
                </li> -->
                <!-- <li>
                    <a href="{{ route('admin.orders.daily') }}"
                        class="@if ($routeName == 'admin.orders.daily') mm-active @endif">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Đơn hàng trong ngày
                    </a>
                </li> -->
                {{--
                <div>
                    <li class="app-sidebar__heading">Quản lý sản phẩm</li>
                    <li>
                        <a href="{{ route('admin.collections.index') }}"
                class="@if ($routeName == 'admin.collections.index') mm-active @endif">
                <i class="metismenu-icon pe-7s-display2"></i>
                Bộ sưu tập sản phẩm
                </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.statistics') }}"
                        class="@if ($routeName == 'admin.products.statistics') mm-active @endif">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Thống kê sản phẩm
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.create') }}"
                        class="@if ($routeName == 'admin.products.create') mm-active @endif">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Thêm mới sản phẩm
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}"
                        class="@if ($routeName == 'admin.products.index') mm-active @endif">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Danh sách sản phẩm
                    </a>
                </li>
        </div> --}}
        {{--
                <div>
                    <li class="app-sidebar__heading">Quản lý Sim Số</li>
                    <li>
                        <a href="{{ route('admin.sim_phone_numbers.statistics') }}"
        class="@if ($routeName == 'admin.sim_phone_numbers.statistics') mm-active @endif">
        <i class="metismenu-icon pe-7s-display2"></i>
        Thống kê Sim Số
        </a>
        </li>
        <li>
            <a href="{{ route('admin.sim_phone_numbers.create') }}"
                class="@if ($routeName == 'admin.sim_phone_numbers.create') mm-active @endif">
                <i class="metismenu-icon pe-7s-display2"></i>
                Thêm mới Sim Số
            </a>
        </li>
        <li>
            <a href="{{ route('admin.sim_phone_numbers.index') }}"
                class="@if ($routeName == 'admin.sim_phone_numbers.index') mm-active @endif">
                <i class="metismenu-icon pe-7s-display2"></i>
                Danh sách Sim Số
            </a>
        </li>
    </div> --}}

    {{-- <div class="hidden">
                    <li class="app-sidebar__heading">Quản lý Đơn hàng</li>
                    <li>
                        <a href="{{ route('admin.orders.statistics') }}"
    class="@if ($routeName == 'admin.orders.statistics') mm-active @endif">
    <i class="metismenu-icon pe-7s-display2"></i>
    Thống kê đơn hàng
    </a>
    </li>
    <li>
        <a href="{{ route('admin.orders.create') }}" class="@if ($routeName == 'admin.orders.create') mm-active @endif">
            <i class="metismenu-icon pe-7s-display2"></i>
            Thêm mới đơn hàng offline
        </a>
    </li>
    <li>
        <a href="{{ route('admin.orders.index') }}" class="@if ($routeName == 'admin.orders.index') mm-active @endif">
            <i class="metismenu-icon pe-7s-display2"></i>
            Danh sách đơn hàng
        </a>
    </li>
</div> --}}

<div>
    <li class="app-sidebar__heading">Quản lý bài viết</li>
    <li>
        <a href="{{ route('admin.posts.statistics') }}"
            class="@if ($routeName == 'admin.posts.statistics') mm-active @endif">
            <i class="metismenu-icon pe-7s-display2"></i>
            Thống kê bài viết
        </a>
    </li>
    <li>
        <a href="{{ route('admin.posts.create') }}" class="@if ($routeName == 'admin.posts.create') mm-active @endif">
            <i class="metismenu-icon pe-7s-display2"></i>
            Thêm mới bài viết
        </a>
    </li>
    <li>
        <a href="{{ route('admin.posts.index') }}" class="@if ($routeName == 'admin.posts.index') mm-active @endif">
            <i class="metismenu-icon pe-7s-display2"></i>
            Danh sách bài viết
        </a>
    </li>
</div>

<div>
    <li class="app-sidebar__heading">Quản lý ảnh slide</li>
    <li>
        <a href="{{ route('admin.slides.create') }}" class="@if ($routeName == 'admin.slides.create') mm-active @endif">
            <i class="metismenu-icon pe-7s-display2"></i>
            Thêm mới slide
        </a>
    </li>
    <li>
        <a href="{{ route('admin.slides.index') }}" class="@if ($routeName == 'admin.slides.index') mm-active @endif">
            <i class="metismenu-icon pe-7s-display2"></i>
            Danh sách slide
        </a>
    </li>
</div>

<div class="hidden">
    <li class="app-sidebar__heading">Landing page</li>
    <li>
        <a href="{{ route('admin.langdingpages.create') }}"
            class="@if ($routeName == 'admin.langdingpages.create') mm-active @endif">
            <i class="metismenu-icon pe-7s-display2"></i>
            Tạo mới landing page
        </a>
    </li>
    <li>
        <a href="{{ route('admin.langdingpages.index') }}"
            class="@if ($routeName == 'admin.langdingpages.index') mm-active @endif">
            <i class="metismenu-icon pe-7s-display2"></i>
            Danh sách landing page
        </a>
    </li>
    <li>
        <a href="{{ route('admin.widgets.index') }}" class="@if ($routeName == 'admin.widgets.index') mm-active @endif">
            <i class="metismenu-icon pe-7s-display2"></i>
            Widget template
        </a>
    </li>
    <li>
        <a href="{{ route('admin.collections.index') }}"
            class="@if ($routeName == 'admin.collections.index') mm-active @endif">
            <i class="metismenu-icon pe-7s-display2"></i>
            Tạo Collections
        </a>
    </li>
</div>

{{-- <div>
                    <li class="app-sidebar__heading">Hệ thống</li>
                    <li>
                        <a href="{{ route('admin.config.seo-page') }}"
class="@if ($routeName == 'admin.config.seo-page') mm-active @endif">
<i class="metismenu-icon pe-7s-display2"></i>
Cấu hình SEO trang tĩnh
</a>
</li>
<li>
    <a href="{{ route('admin.config.general') }}" class="@if ($routeName == 'admin.config.general') mm-active @endif">
        <i class="metismenu-icon pe-7s-display2"></i>
        Cấu hình chung
    </a>
</li>
</div> --}}
</ul>
</div>
</div>
</div>