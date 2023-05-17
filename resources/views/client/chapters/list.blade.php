@extends('client.layouts.master')

@section('title', 'Danh sách chương')

@section('main')

@include('client.inc.search')
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @if ($story->release == 1)
                    <a href="{{ route('client.show.upload.chapter', ['storyId' => $story->id]) }}" class="btn btn-primary mb-3">Thêm chương</a>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Chương</th>
                            <th width="200">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($chapters->count() > 0)
                            @foreach ($chapters as $key => $chapter)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $chapter->name }}</td>
                                    <td>
                                        <a href="{{ route('client.chapter.delete',['id' => $chapter->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn xóa chương này ?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="{{ route('client.chapter.edit.form',['id' => $chapter->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a> 
                                        <a href="{{ route('client.show.chapter',['id' => $chapter->id]) }}" class="btn btn-warning btn-circle btn-sm text-white">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="3">Hiện chưa có chương nào</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
