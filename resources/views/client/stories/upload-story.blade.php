@extends('client.layouts.master')

@section('title', 'Đăng truyện')

@section('css')
<style>
    /* Image preview */
    .image-preview {
        width: 300px;
        min-height: 150px;
        border: 2px solid #dddddd;
        margin-top: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #cccccc;
    }

    .image-preview__image {
        display: none;
        width: 100%;
    }
</style>
@endsection

@section('main')

@include('client.inc.search')

<div class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>ĐĂNG TRUYỆN</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('client.upload.story') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Tiêu đề truyện: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Tiêu đề truyện" style="margin-bottom: 10px;" name="name" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Chuyên mục: <span class="text-danger">*</span></label>
                    <select class="form-control" name="parent_category" id="parent_category_select" style="margin-bottom: 10px;" required>
                        <option value="">Vui lòng chọn chuyên mục</option>
                        @foreach ($parentCategories as $parentCategory)
                            <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-md-center" id="author_container">
                <div class="col-lg-6 col-md-6">
                    <label>Tác giả: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Tác giả" style="margin-bottom: 10px;" name="author" id="author_input" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Thể loại: <span class="text-danger">*</span></label>
                    <select class="form-control" name="category" style="margin-bottom: 10px;" required>
                        <option value="">Vui lòng chọn thể loại</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Tóm tắt: <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="content" name="content"></textarea>
                </div>
            </div>
            <div class="row justify-content-md-center"> 
                <div class="col-lg-6 col-md-6">
                    <div class="custom-file">
                        <label style="margin-top: 10px;">Hình ảnh: <span class="text-danger">*</span></label>
                        <input type="file" id="image" name="image" accept=".png,.gif,.jpg,.jpeg" style="margin-bottom: 10px;border: none;margin-left: -3.5%" />
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="image-preview mb-4 col-lg-3 col-md-3" id="imagePreview" style="margin-left: -22%;">
                    <img src="" alt="Image Preview" class="image-preview__image" />
                    <span class="image-preview__default-text">Hình ảnh</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="site-btn">Đăng tải</button>
                </div>    
            </div>
        </form>        
    </div>
</div>
@endsection

@section('script')
    <script>
        // Image Preview
        const thumbnail = document.getElementById("image");
        const previewContainer = document.getElementById("imagePreview");
        const previewImage = previewContainer.querySelector(".image-preview__image");
        const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

        thumbnail.addEventListener("change",function(){
            const file = this.files[0];

            const reader = new FileReader();
            previewDefaultText.style.display = "none";
            previewImage.style.display = "block";
            reader.addEventListener("load",function(){
                previewImage.setAttribute("src",this.result);
            });
            reader.readAsDataURL(file);
        });
    </script>
@endsection
