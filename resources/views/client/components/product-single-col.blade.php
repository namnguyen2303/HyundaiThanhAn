<!-- Product Single -->
<div class="col-md-3 col-sm-6 col-xs-6">
    <div class="product product-single">
        <div class="product-thumb">
            <div class="product-label">
                @if($product->is_new === 'on') <span>New</span> @endif
                @if($product->is_top === 'on') <span>Top</span> @endif
                @if($product->is_hot === 'on') <span>Hot</span> @endif
                @if($product->discount > 0) <span class="sale">- {{ $product->discount }}%</span> @endif
            </div>
            {{--        <ul class="product-countdown">--}}
            {{--            <li><span>00 H</span></li>--}}
            {{--            <li><span>00 M</span></li>--}}
            {{--            <li><span>00 S</span></li>--}}
            {{--        </ul>--}}
            <button onclick="window.location.href='{{ route('client.product.view', $product->slug) }}'" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem chi tiết</button>
            <img src="{{ $product->cover ?? 'client/img/default.png' }}" alt="">
        </div>
        <div class="product-body">
            @if(!$product->discount)
                <h3 class="product-price">{{ number_format($product->price) }}</h3>
            @else
                <h3 class="product-price">{{ number_format($product->price_discount) }}
                    <del class="product-old-price">{{ number_format($product->price) }}</del>
                </h3>
            @endif
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <h2 class="product-name">
                <a href="{{ route('client.product.view', $product->slug) }}">
                    {{ \Illuminate\Support\Str::limit($product->name, 50) }}
                </a>
            </h2>
            <div class="product-btns">
                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                <button class="primary-btn add-to-cart" onclick="addCart('{{ $product->sku }}')"><i class="fa fa-shopping-cart"></i> Mua ngay</button>
            </div>
        </div>
    </div>
</div>
<!-- /Product Single -->
