@extends('admin.layouts.index')

@section('title', 'Danh sách truyện')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Danh sách truyện</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stories as $key => $story)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $story->name }}</td>
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
                                    <a href="{{ route('story.show', ['id' => $story->id]) }}"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if ($story->status === 0)
                                        <a href="{{ route('story.update-status', ['id' => $story->id, 'status' => 1]) }}"
                                            class="btn btn-success btn-circle btn-sm"
                                            onclick="return confirm('Bạn muốn duyệt truyện này ?')">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-circle btn-sm"
                                            data-toggle="modal" data-target="#storyModal-{{ $story->id }}">
                                            <i class="fas fa-ban"></i>
                                        </a>
                                        <!-- The Modal -->
                                        <div class="modal" id="storyModal-{{ $story->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="{{ route('story.update-status', ['id' => $story->id, 'status' => 2]) }}" method="GET">
                                                            <div class="form-group">
                                                                <label>Lý do từ chối <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" cols="3" rows="3" name="reason" required></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Đóng</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($story->status === 1)
                                        <a href="javascript:void(0)" class="btn btn-danger btn-circle btn-sm"
                                            data-toggle="modal" data-target="#storyModal-{{ $story->id }}">
                                            <i class="fas fa-ban"></i>
                                        </a>
                                        <!-- The Modal -->
                                        <div class="modal" id="storyModal-{{ $story->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="{{ route('story.update-status', ['id' => $story->id, 'status' => 2]) }}" method="GET">
                                                            <div class="form-group">
                                                                <label>Lý do từ chối <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" cols="3" rows="5" name="reason" required></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Đóng</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($story->status === 2)
                                        <a href="{{ route('story.update-status', ['id' => $story->id, 'status' => 1]) }}"
                                            class="btn btn-success btn-circle btn-sm"
                                            onclick="return confirm('Bạn muốn duyệt truyện này ?')">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
