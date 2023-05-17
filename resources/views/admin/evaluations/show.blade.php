@extends('admin.layouts.index')

@section('title', 'Chi tiết đánh giá')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Chi tiết đánh giá</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Người dùng</th>
                        <th>Số sao</th>
                        <th>Ngày đánh giá</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Người dùng</th>
                        <th>Số sao</th>
                        <th>Ngày đánh giá</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($ratingDetails as $ratingDetail)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ \App\Models\User::find($ratingDetail->user_id)->name }}</td>
                            <td>{{ round($ratingDetail->star) }}</td>
                            <td>{{ date('d/m/Y H:i:s', strtotime($ratingDetail->created_at)) }}</td>
                        </tr>
                    @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection