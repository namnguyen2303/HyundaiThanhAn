<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>{{ $title ?? 'Analytics Dashboard' }}
                <div class="page-title-subheading">
                    {{ $description ?? 'This is an example dashboard created using build-in
                    elements and components.' }}
                </div>
            </div>
        </div>
        <div class="page-title-actions">
{{--            <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"--}}
{{--                    class="btn-shadow mr-3 btn btn-dark">--}}
{{--                <i class="fa fa-star"></i>--}}
{{--            </button>--}}
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Hành động
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true"
                     class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ $linkCreate ?? 'javascript:void(0);' }}" class="nav-link">
                                <i class="nav-link-icon lnr-inbox"></i>
                                <span>Thêm mới</span>
                                <div class="ml-auto badge badge-pill badge-secondary">0</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-book"></i>
                                <span>Xóa tất cả</span>
                                <div class="ml-auto badge badge-pill badge-danger">0</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
