<div class="col-md-12">
    <div class="position-relative form-group">
        <label for="image_label">Ảnh Cover</label>
        <div class="input-group">
            <input type="text" name="cover" value="{{ $product->cover ?? null }}" id="image_label" class="form-control">
            <div class="input-group-append">
                <button type="button" id="button-image" class="btn btn-secondary">
                    Chọn ảnh
                </button>
            </div>
            @if(isset($product->cover))<img width="100px" style="border: 1px solid red" src="{{ $product->cover }}" alt="">@endif
        </div>
    </div>
</div>
