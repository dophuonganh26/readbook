@extends('admin.layouts.index')

@section('title', 'Thêm thể loại')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Thêm thể loại</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('category.add') }}" method="POST" enctype="multipart/form-data">

            @csrf
            
            <div class="form-group">
                <label for="name">Tên thể loại: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập tên thể loại" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
          </form>
    </div>
</div>
@endsection