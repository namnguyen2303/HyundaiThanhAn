@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <form  autocomplete="off"  action="{{ route('admin.posts.update', $post->id) }}" method="post">
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
                                    SEO
                                </a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-3" class="nav-link">
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
                                            <label for="name" class="">Tên bài viết <span class="text-danger"
                                                                                          style="font-weight: bold;">(*)</span></label>
                                            <input name="name" required maxlength="191" id="name"
                                                   value="{{ $post->name }}"
                                                   onkeyup="generateSlug('name', 'slug')"
                                                   type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="slug" class="">Đường dẫn uri <span class="text-danger"
                                                                                           style="font-weight: bold;">(*)</span></label>
                                            <input name="slug" required maxlength="191" id="slug"
                                                   value="{{ $post->slug }}"
                                                   type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="display_order" class="">Vị trí hiển thị</label>
                                            <input type="number" name="display_order" value="{{ $post->display_order }}" min="0" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="views" class="">Số lượt xem</label>
                                            <input type="number" readonly name="views" value="{{ $post->views }}" min="0" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="image_label">Ảnh Cover</label>
                                            <div class="input-group">
                                                <input type="text" name="cover" value="{{ $post->cover }}" id="image_label" class="form-control">
                                                <div class="input-group-append">
                                                    <button type="button" id="button-image" class="btn btn-secondary">
                                                        Chọn ảnh
                                                    </button>
                                                </div>
                                                @if(isset($post->cover))<img width="100px" style="border: 1px solid red" src="{{ $post->cover }}" alt="">@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-eg5-1" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label for="overview" class="">Tổng quan</label>
                                    <textarea name="overview" id="overview"
                                              class="form-control">{{ $post->overview }}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="description" class="">Mô tả đầu bài viết</label>
                                    <textarea name="description" id="description"
                                              class="form-control">{{ $post->description }}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="content" class="">Nội dung</label>
                                    <textarea name="content" id="content"
                                              class="form-control">{{ $post->content }}</textarea>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-eg5-2" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label for="tag_title" class="">Thẻ title</label>
                                    <input maxlength="191" name="tag_title" value="{{ $post->tag_title }}"
                                           class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="meta_keywords" class="">Meta keywords</label>
                                    <input maxlength="191" name="meta_keywords"
                                           id="meta_keywords"
                                           value="{{ $post->meta_keywords }}">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="meta_description" class="">Meta description</label>
                                    <input maxlength="191" name="meta_description"
                                           value="{{ $post->meta_description }}" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="rel_canonical" class="">Meta Rel Canonical</label>
                                    <input maxlength="191" name="rel_canonical" value="{{ $post->rel_canonical }}"
                                           class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="meta_author" class="">Meta Author</label>
                                    <input maxlength="191" name="meta_author" value="{{ $post->meta_author }}"
                                           class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="tags" class="">Tags</label>
                                    <input type="text" name="tags" value="{{ $post->tags }}" id="tags">
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-eg5-3" role="tabpanel">
                                <div class="col-md-6" style="float: left;">
                                    <div class="position-relative form-group">
                                        <label for="is_active" class="">Trạng thái ACTIVE</label>
                                        <input type="checkbox" id="is_active" name="is_active"
                                               @if($post->is_active == 'on') checked @endif
                                               data-toggle="toggle" data-style="ios">
                                    </div>
                                </div>
                                <div class="col-md-6" style="float: left;">
                                    <div class="position-relative form-group">
                                        <label for="is_new" class="">Trạng thái NEW</label>
                                        <input type="checkbox" id="is_new" name="is_new"
                                               @if($post->is_new == 'on') checked @endif
                                               data-toggle="toggle" data-style="ios">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6" style="float: left;">
                                    <div class="position-relative form-group">
                                        <label for="is_hot" class="">Trạng thái HOT</label>
                                        <input type="checkbox" id="is_hot" name="is_hot"
                                               @if($post->is_hot == 'on') checked @endif
                                               data-toggle="toggle" data-style="ios">
                                    </div>
                                </div>
                                <div class="col-md-6" style="float: left;">
                                    <div class="position-relative form-group">
                                        <label for="is_top" class="">Trạng thái TOP</label>
                                        <input type="checkbox" id="is_top" name="is_top"
                                               @if($post->is_top == 'on') checked @endif
                                               data-toggle="toggle" data-style="ios">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-block text-center card-footer">
                        <a href="{{ route('admin.posts.index') }}"
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
    <link href="backend/selectize/selectize.default.min.css" rel="stylesheet"/>
@endsection
@section('script')
    <script src="backend/selectize/selectize.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>

    <script>
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

        });

        // set file link
        function fmSetLink($url) {
            document.getElementById(inputId).value = $url;
        }
    </script>
@endsection
