@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Tổng số sản phẩm</div>
                        <div class="widget-subheading">Tất cả sản phẩm có trong hệ thống</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $countTotalProduct }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số sản phẩm đang ACTIVE</div>
                        <div class="widget-subheading">Những sản phẩm đang hoạt động</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $countProductActive }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số sản phẩm NEW</div>
                        <div class="widget-subheading">Những sản phẩm mới phát hành</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $countProductNew }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-alternate">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số sản phẩm TOP</div>
                        <div class="widget-subheading">Những sản phẩm đánh giá cao</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>{{ $countProductTop }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-danger">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số sản phẩm HOT</div>
                        <div class="widget-subheading">Những sản phẩm đang được chú ý</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>{{ $countProductHot }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            <h6 class="text-danger text-uppercase font-size-md opacity-5 font-weight-normal">
                                Top 20 sản phẩm được quan tâm nhiều nhất</h6>
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container">
                                    <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                        @foreach($top20Views as $item)
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">{{ $item->name }}</div>
                                                            <div class="widget-subheading">
                                                                {{ $item->meta_author }}
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="font-size-xlg text-muted">
                                                                <small class="opacity-5 pr-1">
                                                                    <i class="fa fa-eye"></i>
                                                                </small>
                                                                <span>{{ $item->view ?? 0 }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
