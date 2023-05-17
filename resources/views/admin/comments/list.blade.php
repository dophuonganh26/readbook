@extends('admin.layouts.index')

@section('title', 'Danh sách bình luận')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Danh sách bình luận</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Truyện</th>
                        <th>Người bình luận</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ \App\Models\Story::find($comment->story_id)->name }}</td>
                            <td>{{ \App\Models\User::find($comment->user_id)->name }}</td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ date('d/m/Y H:i:s', strtotime($comment->created_at)) }}</td>
                            <td>
                                <a href="{{ route('comment.delete',['id' => $comment->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn xóa bình luận này ?')">
                                    <i class="fas fa-trash"></i>
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
