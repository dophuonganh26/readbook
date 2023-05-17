@extends('client.layouts.master')

@section('title', 'Cập nhật thông tin cá nhân')

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
                    <h2>CẬP NHẬT THÔNG TIN CÁ NHÂN</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('auth.update.profile') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Họ tên: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Họ tên" style="margin-bottom: 10px;" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Email: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Email" style="margin-bottom: 10px;" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Facebook:</label>
                    <input type="text" placeholder="Facebook" style="margin-bottom: 10px;" name="facebook" value="{{ old('facebook', $user->facebook) }}">
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Instagram:</label>
                    <input type="text" placeholder="Instagram" style="margin-bottom: 10px;" name="instagram" value="{{ old('instagram', $user->instagram) }}">
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Tiktok:</label>
                    <input type="text" placeholder="Tiktok" style="margin-bottom: 10px;" name="tiktok" value="{{ old('tiktok', $user->tiktok) }}">
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Twitter:</label>
                    <input type="text" placeholder="Twitter" style="margin-bottom: 10px;" name="twitter" value="{{ old('twitter', $user->twitter) }}">
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Giới thiệu bản thân:</label>
                    <textarea class="form-control" id="content" name="content">{{ old('content', $user->introduce) }}</textarea>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <div class="custom-file">
                        <label style="margin-top: 10px;">Hình ảnh:</label>
                        <input type="file" id="image" name="image" accept=".png,.gif,.jpg,.jpeg" style="margin-bottom: 10px;border: none;margin-left: -3.5%" />
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                @if (!is_null($user->avatar))
                    <div class="image-preview mb-4 col-lg-3 col-md-3" id="imagePreview" style="margin-left: -21%;">
                        <img src="{{ asset($user->avatar) }}" alt="Image Preview" class="image-preview__image" style="display:block;" />
                        <span class="image-preview__default-text" style="display:none;">Hình ảnh</span>
                    </div>
                @else
                    <div class="image-preview mb-4 col-lg-3 col-md-3" id="imagePreview" style="margin-left: -22%;">
                        <img src="" alt="Image Preview" class="image-preview__image" />
                        <span class="image-preview__default-text">Hình ảnh</span>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="site-btn">Cập nhật</button>
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
