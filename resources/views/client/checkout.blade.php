@extends('client.master')

@section('breadcrumb')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('client.home') }}">Trang chủ</a></li>
                <li class="active">Checkout</li>
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
                <div class="col-md-12">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Sản phẩm trong giỏ hàng</h3>
                        </div>
                        <form method="POST" autocomplete="off" action="{{ route('client.shopping-cart.update') }}"
                              id="updateCart">
                            @csrf
                            <table class="shopping-cart-table table">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th></th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Thành tiền</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Facade\CartFacede::content() as $item)
                                    <tr>
                                        <td class="thumb"><img
                                                src="{{ $item->options['cover'] ?? 'client/img/thumb-product01.jpg' }}"
                                                alt=""></td>
                                        <td class="details">
                                            <a href="{{ $item->options['link'] ?? 'javascript:' }}">{{ $item->name }}</a>
                                        </td>
                                        <td class="price text-center">
                                            <strong>{{ $item->price }}</strong>
                                        </td>
                                        <td class="qty text-center"><input class="input" max="10" min="1"
                                                                           name="qty[{{ $item->uniqueId }}]"
                                                                           type="number" value="{{ $item->quantity }}">
                                        </td>
                                        <td class="total text-center"><strong
                                                class="primary-color">{{ number_format($item->price * $item->quantity) }}</strong></td>
                                        <td class="text-right">
                                            <button class="main-btn icon-btn"
                                                    data-href="{{route('client.shopping-cart.delete-item', $item->uniqueId)}}"
                                                    onclick="event.preventDefault(); deleteItem('{{ $item->name }}', this)"
                                            ><i class="fa fa-close"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>Tổng phụ</th>
                                    <th colspan="2" class="sub-total">{{ \App\Facade\CartFacede::getTotal() }}</th>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>Phí vận chuyển</th>
                                    <td colspan="2" class="sub-total"><span style="color:red">(*1)</span></td>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>Tổng tiền</th>
                                    <th colspan="2" class="total">{{ \App\Facade\CartFacede::getTotal() }}</th>
                                </tr>
                                </tfoot>
                            </table>
                            <p style="float:right"><span style="color:red">(*1)</span> Chúng tôi sẽ liên hệ thông báo
                                phí vận chuyển</p>
                            <div style="clear:both"></div>
                        </form>
                        <div class="pull-right">
                            <button class="main-btn btn-default"
                                    onclick="location.href='{{ route('client.shopping-cart.clear-cart') }}'">Xóa giỏ
                                hàng
                            </button>
                            <button onclick="$('#updateCart').submit()" class="main-btn btn-default">Cập nhật giỏ hàng
                            </button>
                       </div>
                    </div>

                </div>
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <form id="booking" autocomplete="off" method="POST" action="{{ route('client.shopping-cart.booking') }}"
                      class="clearfix">
                    @csrf
                    <div class="col-md-6">
                        <div class="billing-details">
                            {{--                            <p>Already a customer ? <a href="#">Login</a></p>--}}
                            <div class="section-title">
                                <h3 class="title">Chi tiết thanh toán</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" required maxlength="191" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Tên (*)">
                            </div>
                            <div class="form-group">
                                <input class="input" required maxlength="191" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Họ Tên Đệm (*)">
                            </div>
                            <div class="form-group">
                                <input class="input" required maxlength="191" type="email" name="email" value="{{ old('email') }}" placeholder="Email (*)">
                            </div>
                            <div class="form-group">
                                <input class="input" required maxlength="500" type="text" name="address" value="{{ old('address') }}" placeholder="Địa chỉ (*)">
                            </div>
                            <div class="form-group">
                                <input class="input" required maxlength="20" type="tel" name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại (*)">
                            </div>
                            <div class="form-group">
                                <textarea style="width: 100%;" maxlength="1000" name="note" placeholder="Ghi chú">{{ old('note') }}</textarea>
                            </div>
                            <div class="form-group">
                                <p style="color: red;">(*): Những trường bắt buộc</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="shiping-methods">
                            <div class="section-title">
                                <h4 class="title">Phương thức vận chuyển</h4>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" id="shipping-1" checked>
                                <label for="shipping-1">Giao hàng nhanh</label>
                                <div class="caption">
                                    <p>
                                        Sử dụng dịch vụ của <a ref="nofollow" href="https://www.ghn.vn/">GHN</a>
                                    <p>
                                </div>
                            </div>
                        </div>

                        <div class="payments-methods">
                            <div class="section-title">
                                <h4 class="title">Phương thức thanh toán</h4>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="payment_type" value="normal" id="payments-1" checked>
                                <label for="payments-1">Thanh toán khi nhận hàng</label>
                                <div class="caption">
                                    <p>
                                        Với phương thức thanh toán khi nhận hàng, bạn có thể trả tiền mặt cho người giao
                                        hàng theo hóa đơn.
                                        Hình thức này được áp dụng trên toàn quốc và không yêu cầu phải trả trước một
                                        khoản tiền
                                        nào. Bạn chỉ phải thanh toán khi nhận được hàng theo đúng số tiền của đơn hàng.
                                    <p>
                                </div>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="payment_type" value="bank_tranfer" id="payments-2">
                                <label for="payments-2">Chuyển tiền trực tiếp qua ngân hàng</label>
                                <div class="caption">
                                    <p>
                                        Với phương thức chuyển tiền trực tiếp qua ngân hàng, bạn sẽ chuyển tiền vào số
                                        tài khoản dưới đây:
                                    <p>
                                    <p>Thông tin chuyển khoản:&nbsp;Người nhận tiền:&nbsp;Trần Thị Kim Yến</p>
                                    <p>- Số tài khoản: <strong>1211.0000.38.1797</strong>&nbsp;tại BIDV - Chi nhánh Hai
                                        Bà Trưng.</p>
                                    <p>-&nbsp;Nội dung gửi:&nbsp;&nbsp;<strong>[Họ_Tên-SĐT] </strong></p>
                                    <p>Thông tin tài khoản của bạn</p>
                                    <div class="form-group">
                                        <input class="input" maxlength="191" value="{{ old('bank_transfer_name') }}" type="text" name="bank_transfer_name"
                                               placeholder="Tên ngân hàng (nên kèm theo chi nhánh)">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" maxlength="191" value="{{ old('bank_transfer_account_type') }}" type="text" name="bank_transfer_account_type"
                                               placeholder="Loại tài khoản chuyển khoản ngân hàng">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" maxlength="191" value="{{ old('bank_transfer_account_name') }}" type="text" name="bank_transfer_account_name"
                                               placeholder="Tên tài khoản chuyển khoản ngân hàng">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" maxlength="191" value="{{ old('bank_transfer_swift_code') }}" type="text" name="bank_transfer_swift_code"
                                               placeholder="SWIFT/BIC code của ngân hàng">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" class="primary-btn">Đặt hàng</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
