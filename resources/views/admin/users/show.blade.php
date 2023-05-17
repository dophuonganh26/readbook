@extends('admin.layouts.index')

@section('title', 'Thông tin tài khoản')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Thông tin tài khoản</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    @if (!is_null($user->avatar))
                        <tr>
                            <th>Ảnh đại diện</th>
                            <td>
                                @if (str_contains($user->avatar, 'storage'))
                                    <img src="{{ asset($user->avatar) }}" width="100" />
                                @else
                                    <img src="{{ $user->avatar }}" width="100" />
                                @endif
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <th>Họ tên</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @if (!is_null($user->facebook))
                        <tr>
                            <th>Facebook</th>
                            <td>{{ $user->facebook }}</td>
                        </tr>
                    @endif
                    @if (!is_null($user->instagram))
                        <tr>
                            <th>Instagram</th>
                            <td>{{ $user->instagram }}</td>
                        </tr>
                    @endif
                    @if (!is_null($user->tiktok))
                        <tr>
                            <th>Tiktok</th>
                            <td>{{ $user->instagram }}</td>
                        </tr>
                    @endif
                    @if (!is_null($user->twitter))
                        <tr>
                            <th>Twitter</th>
                            <td>{{ $user->twitter }}</td>
                        </tr>
                    @endif
                    @if (!is_null($user->introduce))
                        <tr>
                            <th>Giới thiệu</th>
                            <td>{!! $user->introduce !!}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>Trạng thái</th>
                        <td>{!! $user->status == 1 ? '<span class="badge badge-success text-white">Hoạt động</span>' : '<span class="badge badge-danger text-white">Khóa</span>' !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
