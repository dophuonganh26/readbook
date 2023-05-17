@extends('admin.layouts.index')

@section('title', 'Danh sách chương')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Danh sách chương</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Chương</th>
                            <th>Lượt xem</th>
                            <th width="200">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chapters as $key => $chapter)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $chapter->name }}</td>
                                <td>{{ $chapter->view }}</td>
                                <td>
                                    <a href="{{ route('story.show.chapter',['id' => $chapter->id]) }}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
