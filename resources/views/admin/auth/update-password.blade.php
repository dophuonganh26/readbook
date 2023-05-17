@extends('admin.layouts.index')

@section('title', 'Đổi mật khẩu')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Đổi mật khẩu</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('admin.handle.update.password', ['id' => Auth::guard('admin')->user()->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf
            
            <div class="form-group">
                <label for="curpassword">Mật khẩu hiện tại: <span class="text-danger">*</span></label>
                <input type="password" class="form-control" placeholder="Nhập mật khẩu hiện tại" id="curpassword" name="curpassword" required>
            </div>
            <div class="form-group">
                <label for="newpassword">Mật khẩu mới: <span class="text-danger">*</span></label>
                <input type="password" class="form-control" placeholder="Nhập mật khẩu mới" id="newpassword" name="newpassword" required>
            </div>
            <div class="form-group">
                <label for="confpassword">Nhập lại mật khẩu: <span class="text-danger">*</span></label>
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" id="confpassword" name="confpassword" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
          </form>
    </div>
</div>
@endsection