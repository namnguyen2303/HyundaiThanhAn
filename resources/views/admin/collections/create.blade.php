@extends('admin.master')

@php($linkCreate = route('admin.collections.create'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <form autocomplete="off" action="{{ route('admin.collections.store') }}" method="post">
                    @csrf
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
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-eg5-0" role="tabpanel">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="key_collection" class=""> Key bộ sưu tập <span class="text-danger"
                                                                                                 style="font-weight: bold;">(*)</span></label>
                                            <select name="key_collection" required class="form-control">
                                                @foreach(\App\Http\Controllers\Helper::COLLECTION_KEY as $key => $name)
                                                    <option value="{{ $key }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="link" class="">Link
                                                <span class="text-danger"
                                                      style="font-weight: bold;">(*)</span></label>
                                            <input name="link" required maxlength="191"
\                                                   type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="display_order" class="">Sắp xếp hiển thị</label>
                                            <input type="number" value="1" min="1" class="form-control" name="display_order">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="is_active" class="">Trạng thái ACTIVE</label>
                                            <br>
                                            <input type="checkbox" id="is_active" name="is_active" checked
                                                   data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="image_label">Ảnh <span class="text-danger"
                                                                               style="font-weight: bold;">(*)</span></label>
                                            <div class="input-group">
                                                <input type="text" required name="image" id="image_label"
                                                       class="form-control">
                                                <div class="input-group-append">
                                                    <button type="button" id="button-image" class="btn btn-secondary">
                                                        Chọn ảnh
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-block text-center card-footer">
                        <a href="{{ route('admin.collections.index') }}"
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

@section('script')

    <script>
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
