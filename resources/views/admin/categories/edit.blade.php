@extends('admin.layouts.index')

@section('title', 'Cập nhật thể loại')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Cập nhật thể loại</h1>

<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('category.edit',['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="name">Tên thể loại: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập tên thể loại" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
          </form>
    </div>
</div>
@endsection