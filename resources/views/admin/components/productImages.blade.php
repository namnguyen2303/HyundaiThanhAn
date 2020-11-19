@for($i = 0; $i < 6; $i++)
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="image_label">Ảnh Số {{ $i }}</label>
            <div class="input-group">
                <input type="text" name="product_images[]" value="{{ $product->product_images[$i] ?? null }}"
                       id="image_label_{{ $i }}" class="form-control">
                <div class="input-group-append">
                    <button type="button" id="button-image-{{ $i }}" class="btn btn-secondary">
                        Chọn ảnh
                    </button>
                </div>
            </div>
            @if(isset($product->product_images))<img width="100px" style="border: 1px solid red" src="{{ $product->product_images[$i] }}"
                                                     alt="">@endif
        </div>
    </div>
@endfor
