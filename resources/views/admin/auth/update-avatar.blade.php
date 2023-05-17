@extends('admin.layouts.index')

@section('title', 'Cập nhật avatar')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Cập nhật avatar</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('admin.handle.update.avatar', ['id' => Auth::guard('admin')->user()->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @if (is_null(\App\Models\Admin::find(Auth::guard('admin')->user()->id)->avatar))
                <div class="form-group">
                    <label for="image">Chọn hình ảnh: <span class="text-danger">*</span></label>
                    <div class="custom-file">
                        <input type="file" id="image" name="image" accept=".png,.gif,.jpg,.jpeg"  required/>
                    </div>
                </div>
                <div class="image-preview mb-4" id="imagePreview">
                    <img alt="Image Preview" class="image-preview__image" />
                    <span class="image-preview__default-text">Hình ảnh</span>
                </div>
            @else
                <div class="form-group">
                    <label for="image">Chọn hình ảnh:</label>
                    <div class="custom-file">
                        <input type="file" id="image" name="image" accept=".png,.gif,.jpg,.jpeg" />
                    </div>
                </div>
                <div class="image-preview mb-4" id="imagePreview">
                    <img src="{{ asset(\App\Models\Admin::find(Auth::guard('admin')->user()->id)->avatar) }}" alt="Image Preview" class="image-preview__image" style="display:block;" />
                    <span class="image-preview__default-text" style="display:none;">Hình ảnh</span>
                </div>
            @endif
            <br />

            <button type="submit" class="btn btn-primary">Cập nhật</button>
          </form>
    </div>
</div>
@endsection