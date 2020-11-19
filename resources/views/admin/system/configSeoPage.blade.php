@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <form  autocomplete="off" action="{{ route('admin.config.seo-page') }}" method="post">
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
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="page" class="">Danh mục sản phẩm <span class="text-danger"
                                                                                                   style="font-weight: bold;">(*)</span></label>
                                            <select name="page" required class="form-control" id="page">
                                                @foreach(\App\Http\Controllers\Helper::seoPages() as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="position-relative form-group">
                                            <label for="tag_title" class="">Thẻ title</label>
                                            <input maxlength="191" name="tag_title" id="tag_title" class="form-control">
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="meta_keywords" class="">Meta keywords</label>
                                            <input maxlength="191" id="meta_keywords" class="form-control" name="meta_keywords">
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="meta_description" class="">Meta description</label>
                                            <input maxlength="191" name="meta_description" id="meta_description" class="form-control">
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="rel_canonical" class="">Meta Rel Canonical</label>
                                            <input maxlength="191" name="rel_canonical" id="rel_canonical" class="form-control">
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="meta_author" class="">Meta Author</label>
                                            <input maxlength="191" name="meta_author" id="meta_author" class="form-control">
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="tags" class="">Tags</label>
                                            <input type="text" name="tags" class="form-control" id="tags">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-block text-center card-footer">
                        <a href="{{ route('admin.config.seo-page') }}"
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
        $(window).on('load', function() {
            let page = document.getElementById('page').value;
            let url = '{{ route('admin.ajaxLoadDataSEOPage', '@page') }}';
            url = url.replace('@page', page);
            $.get(url, function (data) {
                document.getElementById('meta_author').value = data.meta_author;
                document.getElementById('meta_description').value = data.meta_description;
                document.getElementById('meta_keywords').value = data.meta_keywords;
                document.getElementById('rel_canonical').value = data.rel_canonical;
                document.getElementById('tags').value = data.tags;
                document.getElementById('tag_title').value = data.tag_title;
            })
        });

        $(function () {
            $('#page').change(function () {
                let page = $(this).val();
                let url = '{{ route('admin.ajaxLoadDataSEOPage', '@page') }}';
                url = url.replace('@page', page);
                $.get(url, function (data) {
                    document.getElementById('meta_author').value = data.meta_author;
                    document.getElementById('meta_description').value = data.meta_description;
                    document.getElementById('meta_keywords').value = data.meta_keywords;
                    document.getElementById('rel_canonical').value = data.rel_canonical;
                    document.getElementById('tags').value = data.tags;
                    document.getElementById('tag_title').value = data.tag_title;
                })
            })
        });

    </script>
@endsection
