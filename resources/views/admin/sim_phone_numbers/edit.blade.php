@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <form  autocomplete="off" action="{{ route('admin.sim_phone_numbers.update', $sim->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-header-tab card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-bicycle icon-gradient bg-love-kiss"> </i>
                            Header Alternate Tabs
                        </div>
                        <ul class="nav">
                            <li class="nav-item">
                                <a data-toggle="tab" href="#tab-eg5-0" class="active nav-link">
                                    Thông tin chung
                                </a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-1" class="nav-link">
                                    Nội dung
                                </a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-2" class="nav-link">
                                    Trạng thái
                                </a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-eg5-0" role="tabpanel">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Số điện thoại
                                                <span class="text-danger"
                                                      style="font-weight: bold;">(*)</span></label>
                                            <input name="phone_number" required maxlength="191" id="phone_number"
                                                   type="tel" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="slug" class="">Chọn nhà mạng
                                                <span class="text-danger"
                                                      style="font-weight: bold;">(*)</span></label>
                                            <select name="telco" id="telco" class="form-control">
                                                @foreach(\App\Http\Controllers\Helper::TELCO as $value)
                                                    <option @if($sim->telco === $value) selected
                                                            @endif value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="slug" class="">Giá ban đầu (giá trước khi có lãi)
                                                <span class="text-danger"
                                                      style="font-weight: bold;">(*)</span></label>
                                            <input name="cost" required id="cost" value="{{ $sim->cost }}"
                                                   type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Giá bán (giá bán sau khi có lãi)
                                                <span class="text-danger"
                                                      style="font-weight: bold;">(*)</span></label>
                                            <input name="price" required id="price" value="{{ $sim->price }}"
                                                   type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="slug" class="">Chọn trạng thái bán
                                                <span class="text-danger"
                                                      style="font-weight: bold;">(*)</span></label>
                                            <select name="status" id="status" class="form-control">
                                                @foreach(['sold', 'selling'] as $value)
                                                    <option @if($sim->status === $value) selected
                                                            @endif value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="image_label">Ảnh Cover</label>
                                            <div class="input-group">
                                                <input type="text" name="cover" value="{{ $sim->cover }}"
                                                       id="image_label" class="form-control">
                                                <div class="input-group-append">
                                                    <button type="button" id="button-image" class="btn btn-secondary">
                                                        Chọn ảnh
                                                    </button>
                                                </div>
                                                @if(isset($sim->cover))<img width="100px" style="border: 1px solid red"
                                                                            src="{{ $sim->cover }}" alt="">@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="display_order" class="">Vị trí hiển thị</label>
                                            <input type="number" name="display_order" value="{{ $sim->display_order }}"
                                                   min="0"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="views" class="">Số lượt xem</label>
                                            <input type="number" readonly name="views" value="{{ $sim->views }}" min="0"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-eg5-1" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label for="content" class="">Nội dung</label>
                                    <textarea name="content" id="content"
                                              class="form-control">{{ $sim->content }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-eg5-2" role="tabpanel">
                                <div class="col-md-6" style="float: left;">
                                    <div class="position-relative form-group">
                                        <label for="is_active" class="">Trạng thái ACTIVE</label>
                                        <input type="checkbox" id="is_active" name="is_active"
                                               @if($sim->is_active == 'on') checked @endif
                                               data-toggle="toggle" data-style="ios">
                                    </div>
                                </div>
                                <div class="col-md-6" style="float: left;">
                                    <div class="position-relative form-group">
                                        <label for="is_new" class="">Trạng thái NEW</label>
                                        <input type="checkbox" id="is_new" name="is_new"
                                               @if($sim->is_new == 'on') checked @endif
                                               data-toggle="toggle" data-style="ios">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6" style="float: left;">
                                    <div class="position-relative form-group">
                                        <label for="is_hot" class="">Trạng thái HOT</label>
                                        <input type="checkbox" id="is_hot" name="is_hot"
                                               @if($sim->is_hot == 'on') checked @endif
                                               data-toggle="toggle" data-style="ios">
                                    </div>
                                </div>
                                <div class="col-md-6" style="float: left;">
                                    <div class="position-relative form-group">
                                        <label for="is_top" class="">Trạng thái TOP</label>
                                        <input type="checkbox" id="is_top" name="is_top"
                                               @if($sim->is_top == 'on') checked @endif
                                               data-toggle="toggle" data-style="ios">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-block text-center card-footer">
                        <a href="{{ route('admin.sim_phone_numbers.index') }}"
                           class="btn-wide btn btn-lg btn-link"
                           title="Quay lại trang danh sách">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </a>
                        <button type="submit"
                                class="btn-wide btn btn-lg btn-info">Xác nhận biểu mẫu
                        </button>
                        <button type="reset"
                                class="btn-wide btn btn-lg btn-link text-danger"
                                title="Thiết lập lại biểu mẫu">
                            <i class="pe-7s-close-circle"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link href="backend/select2/select2.min.css" rel="stylesheet"/>

    <link href="backend/select2/select2-bootstrap4.min.css" rel="stylesheet"/>

    <style>
        .select2-container--bootstrap4 .select2-results__option[aria-selected=true] {
            background-color: #1dd8d8 !important;
            color: #16181b;
        }
    </style>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>

    <script src="backend/select2/select2.min.js"></script>

    <script>

        $.fn.select2.defaults.set("theme", "bootstrap4");
        $.fn.select2.defaults.set("ajax--cache", false);
        $.fn.select2.defaults.reset();

        $("#telco").select2({
            theme: 'bootstrap4'
        });

        $("#status").select2({
            theme: 'bootstrap4'
        });

        CKEDITOR.replace('content', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            language: 'vi',
            uiColor: '#AADC6E'
        });

        let inputId = '';

        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label';
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=500');
            });

        });

        // set file link
        function fmSetLink($url) {
            document.getElementById(inputId).value = $url;
        }
    </script>
@endsection
