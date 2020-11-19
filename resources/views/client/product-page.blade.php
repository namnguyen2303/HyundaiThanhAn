@extends('client.master')

@section('breadcrumb')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('client.home') }}">Trang chủ</a></li>
                <li>
                    @php($category = \App\Http\Controllers\Helper::categoryNameProduct()[$product->category])
                    <a href="{{ route('client.product.index', \Illuminate\Support\Str::slug($category)) }}">
                        {{ $category }}
                    </a>
                </li>
                <li class="active">{{ $product->name }}</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->
@endsection

@section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            @if(!array_filter($product->product_images))
                                <div class="product-view">
                                    <img src="client/img/default-lg.png"
                                         alt="{{ $product->name . '-' . str_random(10) }}">
                                </div>
                            @else
                                @foreach($product->product_images as $link)
                                    <div class="product-view">
                                        <img src="{{ $link }}" alt="{{ $product->name . '-' . str_random(10) }}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div id="product-view">
                            @if(!array_filter($product->product_images))
                                <div class="product-view">
                                    <img src="client/img/default-lg.png"
                                         alt="{{ $product->name . '-' . str_random(10) }}">
                                </div>
                            @else
                                @foreach($product->product_images as $link)
                                    <div class="product-view">
                                        <img src="{{ $link }}" alt="{{ $product->name . '-' . str_random(10) }}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <div class="product-label">
                                @if($product->is_new === 'on') <span>New</span> @endif
                                @if($product->is_top === 'on') <span>Top</span> @endif
                                @if($product->is_hot === 'on') <span>Hot</span> @endif
                                @if($product->discount > 0) <span
                                    class="sale">- {{ $product->discount }}%</span> @endif
                            </div>
                            <h2 class="product-name">{{ $product->name }}</h2>
                            @if(!$product->discount)
                                <h3 class="product-price">{{ number_format($product->price) }}</h3>
                            @else
                                <h3 class="product-price">{{ number_format($product->price_discount) }}
                                    <del class="product-old-price">{{ number_format($product->price) }}</del>
                                </h3>
                            @endif
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <a href="#comment">Bình luận</a>
                            </div>
                            <p><strong>Trạng thái:</strong> Còn hàng</p>
                            <p><strong>Thương hiệu:</strong> Phương Đông Huyền Bí</p>
                            <p>
                                {{ $product->overview }}
                            </p>

                            <div class="product-btns">
                                <div class="qty-input">
                                    <span class="text-uppercase">QTY: </span>
                                    <input class="input" max="10" min="1" name="qty" id="qty-{{$product->sku}}" type="number" value="1">
                                </div>
                                <button class="primary-btn add-to-cart"
                                        onclick="let qty = $('#qty-' + '{{$product->sku}}').val(); addCart('{{ $product->sku }}', qty)">
                                    <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                </button>
                                <div class="pull-right">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
                                <li><a data-toggle="tab" href="#tab-content">Chi tiết sản phẩm</a></li>
                                <li><a data-toggle="tab" href="#comment">Bình luận</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="description" class="tab-pane fade in active">
                                    {!! $product->description !!}
                                </div>
                                <div id="tab-content" class="tab-pane fade in active">
                                    {!! $product->content !!}
                                </div>
                                <div id="comment" class="tab-pane fade in">

                                    <div class="row">
                                        <div class="fb-comments"
                                             data-width="100%"
                                             width="100%"
                                             data-order-by="reverse_time"
                                             data-href="{{ route('client.product.view', $product->slug) }}"
                                             data-numposts="5"></div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Product Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    @if(!empty($productSuggest))
        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Sản phẩm gợi ý cho bạn</h2>
                        </div>
                    </div>
                    <!-- section title -->

                    @foreach($productSuggest as $product)
                        @include('client.components.product-single-col', compact('product'))
                    @endforeach

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->
    @endif

    @if(!empty($productBestSell))
        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Sản phẩm bán chạy nhất</h2>
                        </div>
                    </div>
                    <!-- section title -->

                    @foreach($productBestSell as $product)
                        @include('client.components.product-single-col', compact('product'))
                    @endforeach

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->
    @endif

    @if(!empty($productRelated))
        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Sản phẩm liên quan</h2>
                        </div>
                    </div>
                    <!-- section title -->

                    @foreach($productRelated as $product)
                        @include('client.components.product-single-col', compact('product'))
                    @endforeach

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->
    @endif
@endsection
