@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Tổng số bài viết</div>
                        <div class="widget-subheading">Tất cả bài viết có trong hệ thống</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $countTotalPost }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số bài viết đang ACTIVE</div>
                        <div class="widget-subheading">Những bài viết đang hoạt động</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $countPostActive }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số bài viết NEW</div>
                        <div class="widget-subheading">Những bài viết mới phát hành</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $countPostNew }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-alternate">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số bài viết TOP</div>
                        <div class="widget-subheading">Những bài viết đánh giá cao</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>{{ $countPostTop }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-danger">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số bài viết HOT</div>
                        <div class="widget-subheading">Những bài viết đang được chú ý</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>{{ $countPostHot }}</span></div>
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
                                Top 20 bài viết được quan tâm nhiều nhất</h6>
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
