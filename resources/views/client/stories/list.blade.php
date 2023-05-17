@extends('client.layouts.master')

@section('title', 'Danh sách truyện')

@section('main')

@include('client.inc.search')
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>DANH SÁCH TRUYỆN</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <a href="{{ route('client.show.upload.story') }}" class="btn btn-primary mb-3">Đăng truyện</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề truyện</th>
                            <th>Tác giả</th>
                            <th>Chuyên mục</th>
                            <th>Thể loại</th>
                            <th>Tóm tắt</th>
                            <th>Trạng thái duyệt truyện</th>
                            <th>Trạng thái ra truyện</th>
                            <th width="180">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($stories->count() > 0)
                            @foreach ($stories as $key => $story)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ route('client.story.detail', ['id' => $story->id]) }}">{{ $story->name }}</a></td>
                                    <td>
                                        @if (is_null($story->author))
                                            {{ \App\Models\User::find($story->user_id)->name }}
                                        @else
                                            <div>Edit: {{ \App\Models\User::find($story->user_id)->name }}</div>
                                            <div>Tác giả: {{ $story->author }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        {{ \App\Models\ParentCategory::find($story->parent_category_id)->name }}
                                    </td>
                                    <td>
                                        {{ \App\Models\Category::find($story->category_id)->name }}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#descriptionModal-{{ $story->id }}">
                                            Xem
                                        </a>
                                        <div class="modal" id="descriptionModal-{{ $story->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Nội dung tóm tắt</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        {!! $story->short_description !!}
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Đóng</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @switch($story->status)
                                            @case(0)
                                                <span class="badge badge-warning text-white">Chờ duyệt</span>
                                                @break
                                            @case(1)
                                                <span class="badge badge-success text-white">Duyệt</span>
                                                @break
                                            @default
                                                <span class="badge badge-danger text-white">Từ chối</span>
                                                <p class="text-danger">Lý do: {{ $story->reason }}</p>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @switch($story->release)
                                            @case(1)
                                                <span class="badge badge-warning text-white">Đang ra</span>
                                                @break
                                            @default
                                                <span class="badge badge-success text-white">Đã hoàn thành</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @if ($story->status != 1)
                                            <a href="{{ route('client.story.delete',['id' => $story->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn xóa truyện này ?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <a href="{{ route('client.story.edit.form',['id' => $story->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                                <i class="fas fa-pen"></i>
                                            </a> 
                                        @endif
                                        <a href="{{ route('client.show.story',['id' => $story->id]) }}" class="btn btn-warning btn-circle btn-sm text-white">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if ($story->release == 1)
                                            <a href="{{ route('client.update.release',['id' => $story->id, 'release' => 0]) }}" class="btn btn-danger btn-circle btn-sm text-white">
                                                <i class="fas fa-ban"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('client.update.release',['id' => $story->id, 'release' => 1]) }}" class="btn btn-success btn-circle btn-sm text-white">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="8">Hiện chưa có truyện nào</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
