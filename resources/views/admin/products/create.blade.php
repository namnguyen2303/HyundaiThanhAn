@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <form  autocomplete="off"  action="{{ route('admin.products.store') }}" method="post">
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
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-1" class="nav-link">
                                    Nội dung
                                </a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-2" class="nav-link">
                                    SEO
                                </a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-3" class="nav-link">
                                    Ảnh
                                </a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-4" class="nav-link">
                                    Sản phẩm gợi ý
                                </a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-5" class="nav-link">
                                    Sản phẩm Liên quan
                                </a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-6" class="nav-link">
                                    Trạng thái
                                </a></li>
                        </ul>
                    </div>
                    @if($product)
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-eg5-0" role="tabpanel">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="name" class="">Tên sản phẩm <span class="text-danger"
                                                                                              style="font-weight: bold;">(*)</span></label>
                                                <input name="name" required maxlength="191" id="name"
                                                       value="{{ $product->name }}"
                                                       onkeyup="generateSlug('name', 'slug')"
                                                       type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="slug" class="">Đường dẫn uri <span class="text-danger"
                                                                                               style="font-weight: bold;">(*)</span></label>
                                                <input name="slug" required maxlength="191" id="slug"
                                                       value="{{ $product->slug }}"
                                                       type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="sku" class="">Mã sản phẩm
                                                    <span class="text-danger"
                                                          style="font-weight: bold;">(*)</span></label>
                                                <input name="sku" required maxlength="191" id="sku"
                                                       value="{{ $product->sku }}"
                                                       type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="category" class="">Danh mục sản phẩm <span class="text-danger"
                                                                                                       style="font-weight: bold;">(*)</span></label>
                                                <select name="category" required class="form-control" id="category">
                                                    @foreach(\App\Http\Controllers\Helper::categoryProduct() as $label => $item)
                                                        <optgroup label="{{ $label }}">
                                                            @foreach($item as $key => $value)
                                                                <option
                                                                    @if($product->category == $key)
                                                                    selected
                                                                    @endif
                                                                    value="{{ $key }}">{{ $value }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="views" class="">Số lượt xem</label>
                                                <input type="number" readonly name="views" value="{{ $product->views }}" min="0"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="cost" class="">Giá mua</label>
                                                <input name="cost" id="cost"
                                                       value="{{ $product->cost }}"
                                                       type="number" min="0" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="price" class="">Giá bán</label>
                                                <input name="price" id="price"
                                                       value="{{ $product->price }}"
                                                       type="number" min="0" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="discount" class="">Sale (%)</label>
                                                <input name="discount" min="0" max="100" id="discount"
                                                       value="{{ $product->discount }}"
                                                       type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="price_discount" class="">Giá Khuyến sale</label>
                                                <input name="price_discount" id="price_discount"
                                                       value="{{ $product->price_discount }}"
                                                       type="number" min="0" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-1" role="tabpanel">
                                    <div class="position-relative form-group">
                                        <label for="overview" class="">Tổng quan</label>
                                        <textarea name="overview" id="overview"
                                                  class="form-control">{{ $product->overview }}</textarea>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="description" class="">Mô tả đầu bài viết</label>
                                        <textarea name="description" id="description"
                                                  class="form-control">{{ $product->description }}</textarea>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="content" class="">Nội dung</label>
                                        <textarea name="content" id="content"
                                                  class="form-control">{{ $product->content }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-2" role="tabpanel">
                                    <div class="position-relative form-group">
                                        <label for="tag_title" class="">Thẻ title</label>
                                        <input maxlength="191" name="tag_title" value="{{ $product->tag_title }}"
                                               class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="meta_keywords" class="">Meta keywords</label>
                                        <input maxlength="191" name="meta_keywords"
                                               id="meta_keywords"
                                               value="{{ $product->meta_keywords }}">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="meta_description" class="">Meta description</label>
                                        <input maxlength="191" name="meta_description"
                                               value="{{ $product->meta_description }}" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="rel_canonical" class="">Meta Rel Canonical</label>
                                        <input maxlength="191" name="rel_canonical" value="{{ $product->rel_canonical }}"
                                               class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="meta_author" class="">Meta Author</label>
                                        <input maxlength="191" name="meta_author" value="{{ $product->meta_author }}"
                                               class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="tags" class="">Tags</label>
                                        <input type="text" name="tags" value="{{ $product->tags }}" id="tags">
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-3" role="tabpanel">
                                    <div class="form-row">

                                        @include('admin.components.productImageCover', compact('product'))

                                        @include('admin.components.productImages', compact('product'))

                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-4" role="tabpanel">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="product_suggestions" class="">Chọn sản phẩm gợi ý</label>
                                            <select name="product_suggestions[]" class="form-control" multiple
                                                    id="product_suggestions">
                                                @foreach($productsAdmin as $productID => $productName)
                                                    <option
                                                        @if($product->product_suggestions
                                                        && in_array($productID, $product->product_suggestions))
                                                        selected
                                                        @endif
                                                        value="{{ $productID }}">{{ $productName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-5" role="tabpanel">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="product_relateds" class="">Chọn sản phẩm liên quan</label>
                                            <select name="product_relateds[]" class="form-control" multiple
                                                    id="product_relateds">
                                                @foreach($productsAdmin as $productID => $productName)
                                                    <option
                                                        @if($product->product_relateds
                                                        && in_array($productID, $product->product_relateds))
                                                        selected
                                                        @endif
                                                        value="{{ $productID }}">{{ $productName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-6" role="tabpanel">
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="is_active" class="">Trạng thái ACTIVE</label>
                                            <input type="checkbox" id="is_active" name="is_active"
                                                   @if($product->is_active == 'on') checked @endif
                                                   data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="is_new" class="">Trạng thái NEW</label>
                                            <input type="checkbox" id="is_new" name="is_new"
                                                   @if($product->is_new == 'on') checked @endif
                                                   data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="is_hot" class="">Trạng thái HOT</label>
                                            <input type="checkbox" id="is_hot" name="is_hot"
                                                   @if($product->is_hot == 'on') checked @endif
                                                   data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="is_top" class="">Trạng thái TOP</label>
                                            <input type="checkbox" id="is_top" name="is_top"
                                                   @if($product->is_top == 'on') checked @endif
                                                   data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="is_top" class="">Sản phẩm trong ngày</label>
                                            <input type="checkbox" id="in_day" name="in_day"
                                                   @if($product->in_day == 'on') checked @endif
                                                   data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-eg5-0" role="tabpanel">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="name" class="">Tên sản phẩm <span class="text-danger"
                                                                                              style="font-weight: bold;">(*)</span></label>
                                                <input name="name" required maxlength="191" id="name"
                                                       onkeyup="generateSlug('name', 'slug')"
                                                       type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="slug" class="">Đường dẫn uri <span class="text-danger"
                                                                                               style="font-weight: bold;">(*)</span></label>
                                                <input name="slug" required maxlength="191" id="slug"
                                                       type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="sku" class="">Mã sản phẩm
                                                    <span class="text-danger"
                                                          style="font-weight: bold;">(*)</span></label>
                                                <input name="sku" required maxlength="191" id="sku"
                                                       type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="category" class="">Danh mục sản phẩm <span
                                                        class="text-danger"
                                                        style="font-weight: bold;">(*)</span></label>
                                                <select name="category" required class="form-control" id="category">
                                                    @foreach(\App\Http\Controllers\Helper::categoryProduct() as $label => $item)
                                                        <optgroup label="{{ $label }}">
                                                            @foreach($item as $key => $value)
                                                                <option value="{{ $key }}">{{ $value }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="views" class="">Số lượt xem</label>
                                                <input type="number" readonly name="views" value="0" min="0"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="cost" class="">Giá mua</label>
                                                <input name="cost" id="cost"
                                                       type="number" min="0" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="price" class="">Giá bán</label>
                                                <input name="price" id="price"
                                                       type="number" min="0" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="discount" class="">Sale (%)</label>
                                                <input name="discount" min="0" max="100" id="discount"
                                                       type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="price_discount" class="">Giá Khuyến sale</label>
                                                <input name="price_discount" id="price_discount"
                                                       type="number" min="0" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-1" role="tabpanel">
                                    <div class="position-relative form-group">
                                        <label for="overview" class="">Tổng quan</label>
                                        <textarea name="overview" id="overview" class="form-control"></textarea>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="description" class="">Mô tả đầu bài viết</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="content" class="">Nội dung</label>
                                        <textarea name="content" id="content" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-2" role="tabpanel">
                                    <div class="position-relative form-group">
                                        <label for="tag_title" class="">Thẻ title</label>
                                        <input maxlength="191" name="tag_title" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="meta_keywords" class="">Meta keywords</label>
                                        <input maxlength="191" id="meta_keywords" name="meta_keywords">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="meta_description" class="">Meta description</label>
                                        <input maxlength="191" name="meta_description" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="rel_canonical" class="">Meta Rel Canonical</label>
                                        <input maxlength="191" name="rel_canonical" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="meta_author" class="">Meta Author</label>
                                        <input maxlength="191" name="meta_author" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="tags" class="">Tags</label>
                                        <input type="text" name="tags" id="tags">
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-3" role="tabpanel">
                                    <div class="form-row">

                                        @include('admin.components.productImageCover')

                                        @include('admin.components.productImages')

                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-4" role="tabpanel">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="product_suggestions" class="">Chọn sản phẩm gợi ý</label>
                                            <select name="product_suggestions[]" class="form-control" multiple
                                                    id="product_suggestions">
                                                @foreach($productsAdmin as $productID => $productName)
                                                    <option value="{{ $productID }}">{{ $productName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-5" role="tabpanel">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="product_relateds" class="">Chọn sản phẩm liên quan</label>
                                            <select name="product_relateds[]" class="form-control" multiple
                                                    id="product_relateds">
                                                @foreach($productsAdmin as $productID => $productName)
                                                    <option value="{{ $productID }}">{{ $productName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg5-6" role="tabpanel">
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="is_active" class="">Trạng thái ACTIVE</label>
                                            <input type="checkbox" id="is_active" name="is_active" checked
                                                   data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="is_new" class="">Trạng thái NEW</label>
                                            <input type="checkbox" id="is_new" name="is_new" checked
                                                   data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="is_hot" class="">Trạng thái HOT</label>
                                            <input type="checkbox" id="is_hot" name="is_hot"
                                                   data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="is_top" class="">Trạng thái TOP</label>
                                            <input type="checkbox" id="is_top" name="is_top"
                                                   data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6" style="float: left;">
                                        <div class="position-relative form-group">
                                            <label for="is_top" class="">Sản phẩm trong ngày</label>
                                            <input type="checkbox" id="in_day" name="in_day"
                                                   data-toggle="toggle" data-style="ios">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="d-block text-center card-footer">
                        <a href="{{ route('admin.products.index') }}"
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

    <link href="backend/selectize/selectize.default.min.css" rel="stylesheet"/>

    <style>
        .select2-container--bootstrap4 .select2-results__option[aria-selected=true] {
            background-color: #1dd8d8 !important;
            color: #16181b;
        }
    </style>
@endsection
@section('script')

    <script src="backend/select2/select2.min.js"></script>

    <script src="backend/selectize/selectize.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>

    <script>

        $.fn.select2.defaults.set("theme", "bootstrap4");
        $.fn.select2.defaults.set("ajax--cache", false);
        $.fn.select2.defaults.reset();

        CKEDITOR.replace('content', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            language: 'vi',
            uiColor: '#AADC6E'
        });

        CKEDITOR.replace('description', {
            language: 'vi',
            toolbarGroups: [
                {name: 'basicstyles', groups: ['basicstyles', 'cleanup']}, {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'align']
                }, {name: 'tools'}, {
                    groups: ['mode']
                }
            ],
            format_tags: 'p;h1;h2;h3;pre'
        });

        $("#category").select2({
            theme: 'bootstrap4'
        });


        $("#product_relateds").select2({
            theme: 'bootstrap4',
            tags: true
        });


        $("#product_suggestions").select2({
            theme: 'bootstrap4',
            tags: true
        });

        $('#tags').selectize({
            persist: false,
            createOnBlur: true,
            create: true
        });

        $('#meta_keywords').selectize({
            persist: false,
            createOnBlur: true,
            create: true
        });

        let inputId = '';

        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label';
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=500');
            });

            document.getElementById('button-image-0').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label_0';
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=500');
            });

            document.getElementById('button-image-1').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label_1';
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=500');
            });

            document.getElementById('button-image-2').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label_2';
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=500');
            });

            document.getElementById('button-image-3').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label_3';
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=500');
            });

            document.getElementById('button-image-4').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label_4';
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=500');
            });

            document.getElementById('button-image-5').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label_5';
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=500');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById(inputId).value = $url;
        }
    </script>
@endsection
