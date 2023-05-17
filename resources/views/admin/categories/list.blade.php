@extends('admin.layouts.index')

@section('title', 'Danh sách thể loại')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Danh sách thể loại</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên thể loại</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('category.delete',['id' => $category->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn xóa thể loại này ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="{{ route('category.edit.form',['id' => $category->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
