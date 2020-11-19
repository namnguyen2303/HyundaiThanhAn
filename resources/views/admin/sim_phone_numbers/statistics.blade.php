@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Tổng số SIM</div>
                        <div class="widget-subheading">Tất cả SIM có trong hệ thống</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $countTotalSim }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số SIM đang ACTIVE</div>
                        <div class="widget-subheading">Những SIM đang hoạt động</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $countSimActive }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số SIM NEW</div>
                        <div class="widget-subheading">Những SIM mới phát hành</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $countSimNew }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-alternate">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số SIM TOP</div>
                        <div class="widget-subheading">Những SIM đánh giá cao</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>{{ $countSimTop }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-danger">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Số SIM HOT</div>
                        <div class="widget-subheading">Những SIM đang được chú ý</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>{{ $countSimHot }}</span></div>
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
                                Top 20 SIM được quan tâm nhiều nhất</h6>
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
                                                                {{ $item->telco }}
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
