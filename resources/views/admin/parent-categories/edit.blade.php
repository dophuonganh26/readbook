@extends('admin.layouts.index')

@section('title', 'Cập nhật chuyên mục')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Cập nhật chuyên mục</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('parentcategory.edit', ['id' => $parentCategory->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf
            
            <div class="form-group">
                <label for="name">Tên chuyên mục: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập tên chuyên mục" id="name" name="name" value="{{ $parentCategory->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
          </form>
    </div>
</div>
@endsection