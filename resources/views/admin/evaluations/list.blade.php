@extends('admin.layouts.index')

@section('title', 'Danh sách dánh giá')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Danh sách dánh giá</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Truyện</th>
                        <th>Số sao trung bình</th>
                        <th>Lượt đánh giá</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($ratings as $rating)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ \App\Models\Story::find($rating->story_id)->name }}</td>
                            <td>{{ round($rating->avg_star) }}</td>
                            <td>{{ \App\Models\Evaluation::where('story_id', $rating->story_id)->count() }}</td>
                            <td>
                                <a href="{{ route('rating.show',['id' => $rating->story_id]) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
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
