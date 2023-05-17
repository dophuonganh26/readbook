@extends('admin.layouts.index')

@section('title', 'Danh sách chuyên mục')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Danh sách chuyên mục</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên chuyên mục</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($parentCategories as $parentCategory)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $parentCategory->name }}</td>
                            <td>
                                {{ $parentCategory->status == 1 ? 'Hiện' : 'Ẩn' }}
                            </td>
                            <td>
                                <a href="{{ route('parentcategory.delete',['id' => $parentCategory->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn xóa chuyên mục này ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="{{ route('parentcategory.edit.form',['id' => $parentCategory->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                @if ($parentCategory->status == 1)
                                    <a href="{{ route('parentcategory.update.status',['id' => $parentCategory->id, 'status' => 0]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn ẩn chuyên mục này ?')">
                                        <i class="fas fa-ban"></i>
                                    </a>
                                @else
                                    <a href="{{ route('parentcategory.update.status',['id' => $parentCategory->id, 'status' => 1]) }}" class="btn btn-success btn-circle btn-sm" onclick="return confirm('Bạn muốn hiện chuyên mục này ?')">
                                        <i class="fas fa-check"></i>
                                    </a>
                                @endif
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
