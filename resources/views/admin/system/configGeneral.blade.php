@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <form  autocomplete="off" action="{{ route('admin.config.general') }}" method="post">
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
                                    Socials
                                </a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-2" class="nav-link">
                                    Scripts
                                </a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-eg5-0" role="tabpanel">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="name_web" class="">Tên web</label>
                                            <input name="name_web" maxlength="191"
                                                   value="{{ $model->name_web }}"
                                                   type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="image_label">Ảnh Logo</label>
                                            <div class="input-group">
                                                <input type="text" name="logo_web"
                                                       value="{{ $model->logo_web ?? null }}" id="image_label_logo_web"
                                                       class="form-control">
                                                <div class="input-group-append">
                                                    <button type="button" id="button-image-logo_web"
                                                            class="btn btn-secondary">
                                                        Chọn ảnh
                                                    </button>
                                                </div>
                                                @if(isset($model->logo_web))
                                                    <img width="100px"
                                                         style="border: 1px solid red"
                                                         src="{{ $model->logo_web }}"
                                                         alt="">@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="image_label">Ảnh Favicon</label>
                                            <div class="input-group">
                                                <input type="text" name="favicon"
                                                       value="{{ $model->favicon ?? null }}" id="image_label_favicon"
                                                       class="form-control">
                                                <div class="input-group-append">
                                                    <button type="button" id="button-image-favicon"
                                                            class="btn btn-secondary">
                                                        Chọn ảnh
                                                    </button>
                                                </div>
                                                @if(isset($model->favicon))
                                                    <img width="100px"
                                                         style="border: 1px solid red"
                                                         src="{{ $model->favicon }}"
                                                         alt="">@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="email_support" class="">Email Support</label>
                                            <input name="email_support" id="email_support"
                                                   value="{{ $model->email_support }}"
                                                   type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="hotline" class="">Hotline</label>
                                            <input name="hotline" id="hotline"
                                                   value="{{ $model->hotline }}"
                                                   type="tel" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-eg5-1" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label for="social_facebook"
                                           class="">{{ \Illuminate\Support\Str::camel('social_facebook') }}</label>
                                    <input maxlength="191" name="social_facebook" value="{{ $model->social_facebook }}"
                                           class="form-control"></div>
                                <div class="position-relative form-group">
                                    <label for="social_skype"
                                           class="">{{ \Illuminate\Support\Str::camel('social_skype') }}</label>
                                    <input maxlength="191" name="social_skype" value="{{ $model->social_skype }}"
                                           class="form-control"></div>
                                <div class="position-relative form-group">
                                    <label for="social_twitter"
                                           class="">{{ \Illuminate\Support\Str::camel('social_twitter') }}</label>
                                    <input maxlength="191" name="social_twitter" value="{{ $model->social_twitter }}"
                                           class="form-control"></div>
                                <div class="position-relative form-group">
                                    <label for="social_pinterest"
                                           class="">{{ \Illuminate\Support\Str::camel('social_pinterest') }}</label>
                                    <input maxlength="191" name="social_pinterest"
                                           value="{{ $model->social_pinterest }}"
                                           class="form-control"></div>
                                <div class="position-relative form-group">
                                    <label for="social_linkdin"
                                           class="">{{ \Illuminate\Support\Str::camel('social_linkdin') }}</label>
                                    <input maxlength="191" name="social_linkdin" value="{{ $model->social_linkdin }}"
                                           class="form-control"></div>
                                <div class="position-relative form-group">
                                    <label for="social_instagram"
                                           class="">{{ \Illuminate\Support\Str::camel('social_instagram') }}</label>
                                    <input maxlength="191" name="social_instagram"
                                           value="{{ $model->social_instagram }}"
                                           class="form-control"></div>
                                <div class="position-relative form-group">
                                    <label for="social_youtube"
                                           class="">{{ \Illuminate\Support\Str::camel('social_youtube') }}</label>
                                    <input maxlength="191" name="social_youtube" value="{{ $model->social_youtube }}"
                                           class="form-control"></div>
                            </div>
                            <div class="tab-pane" id="tab-eg5-2" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label for="google_analytic"
                                           class="">{{ \Illuminate\Support\Str::camel('google_analytic') }}</label>
                                    <textarea name="google_analytic" id="google_analytic"
                                              class="form-control">{{ $model->google_analytic }}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="google_map"
                                           class="">{{ \Illuminate\Support\Str::camel('google_map') }}</label>
                                    <textarea name="google_map" id="google_map"
                                              class="form-control">{{ $model->google_map }}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="google_webmaster"
                                           class="">{{ \Illuminate\Support\Str::camel('google_webmaster') }}</label>
                                    <textarea name="google_webmaster" id="google_webmaster"
                                              class="form-control">{{ $model->google_webmaster }}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="google_adsense"
                                           class="">{{ \Illuminate\Support\Str::camel('google_adsense') }}</label>
                                    <textarea name="google_adsense" id="google_adsense"
                                              class="form-control">{{ $model->google_adsense }}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="google_ads"
                                           class="">{{ \Illuminate\Support\Str::camel('google_ads') }}</label>
                                    <textarea name="google_ads" id="google_ads"
                                              class="form-control">{{ $model->google_ads }}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="facebook_pixel"
                                           class="">{{ \Illuminate\Support\Str::camel('facebook_pixel') }}</label>
                                    <textarea name="facebook_pixel" id="facebook_pixel"
                                              class="form-control">{{ $model->facebook_pixel }}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="facebook_auth"
                                           class="">{{ \Illuminate\Support\Str::camel('facebook_auth') }}</label>
                                    <textarea name="facebook_auth" id="facebook_auth"
                                              class="form-control">{{ $model->facebook_auth }}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="facebook_script"
                                           class="">{{ \Illuminate\Support\Str::camel('facebook_script') }}</label>
                                    <textarea name="facebook_script" id="facebook_script"
                                              class="form-control">{{ $model->facebook_script }}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="web_style"
                                           class="">{{ \Illuminate\Support\Str::camel('web_style') }}</label>
                                    <textarea name="web_style" id="web_style"
                                              class="form-control">{{ $model->web_style }}</textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="web_script"
                                           class="">{{ \Illuminate\Support\Str::camel('web_script') }}</label>
                                    <textarea name="web_script" id="web_script"
                                              class="form-control">{{ $model->web_script }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-block text-center card-footer">
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

            document.getElementById('button-image-logo_web').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label_logo_web';
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=500');
            });

            document.getElementById('button-image-favicon').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'image_label_favicon';
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=500');
            });

        });

        // set file link
        function fmSetLink($url) {
            document.getElementById(inputId).value = $url;
        }
    </script>
@endsection
