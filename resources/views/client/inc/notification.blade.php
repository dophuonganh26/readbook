<thead>
    <tr>
        <th>#</th>
        <th width="300">Nội dung</th>
        <th>Thời gian nhận</th>
        <th>Thời gian đọc</th>
        <th>Chức năng</th>
    </tr>
</thead>
<tbody>
    @if ($notifications->count() > 0)
        @foreach ($notifications as $key => $notification)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    @if ($notification->data['type'] === 1)
                        Tác giả <span class="text-primary">"{{ $notification->data['author'] }}"</span> vừa ra truyện mới <span class="text-success">"{{ $notification->data['story'] }}"</span>
                    @else
                        Truyện <span class="text-primary">"{{ $notification->data['story'] }}"</span> vừa ra chương mới <span class="text-success">"{{ $notification->data['chapter'] }}"</span>
                    @endif
                    @if(is_null($notification->read_at)) <span class="text-danger new-{{ Auth::user()->id }}" id="new-item-{{ $notification->id }}">Mới</span>@endif
                </td>
                <td>{{ $notification->data['date'] }}</td>
                <td id="date-read-{{ $notification->id }}">{{ !is_null($notification->read_at) ? date('d/m/Y H:i:s', strtotime($notification->read_at)) : 'N/A' }}</td>
                <td>
                    @if (is_null($notification->read_at))
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm mark-as-read-{{ Auth::user()->id }}" id="notification-mark-as-read-{{ $notification->id }}" onclick="markAsRead('{{$notification->id}}')">
                            Đã đọc
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td class="text-center" colspan="5">Hiện chưa có thông báo</td>
        </tr>
    @endif
</tbody>
