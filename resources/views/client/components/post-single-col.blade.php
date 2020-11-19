<!-- Product Single -->
<div class="col-md-3 col-sm-6 col-xs-6">
    <div class="product product-single">
        <div class="product-thumb">
            <div class="product-label">
                @if($post->is_new === 'on') <span>New</span> @endif
                @if($post->is_top === 'on') <span>Top</span> @endif
                @if($post->is_hot === 'on') <span>Hot</span> @endif
            </div>
            {{--        <ul class="product-countdown">--}}
            {{--            <li><span>00 H</span></li>--}}
            {{--            <li><span>00 M</span></li>--}}
            {{--            <li><span>00 S</span></li>--}}
            {{--        </ul>--}}
            <button onclick="window.location.href='{{ route('client.post.detail', $post->slug) }}'" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem chi tiết</button>
            <img src="{{ $post->cover ?? 'client/img/default.png' }}" alt="">
        </div>
        <div class="product-body">
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <h2 class="product-name">
                <a href="{{ route('client.product.view', $post->slug) }}">
                    {{ \Illuminate\Support\Str::limit($post->name, 50) }}
                </a>
            </h2>
        </div>
    </div>
</div>
<!-- /Product Single -->
