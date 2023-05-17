<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications()->orderBy('read_at', 'asc')->orderBy('created_at', 'desc')->get();

        return view('client.notifications', compact('notifications'));
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        $notifications = Auth::user()->notifications()->orderBy('read_at', 'asc')->orderBy('created_at', 'desc')->get();
        foreach ($notifications as $k => $notification) {
            $notifications[$k]['date_read'] = date('d/m/Y H:i:s', strtotime($notification->read_at));
        }
        return response()->json([
            'status' => 200,
            'notifications' => $notifications,
            'check' => Auth::user()->unreadNotifications->count() - 1,
            'id' => Auth::user()->id,
        ]); 
    }

    public function markAsRead(Request $request)
    {
        Auth::user()->unreadNotifications->where('id', $request->id)->markAsRead();
        return response()->json([
            'status' => 200,
            'count' => Auth::user()->unreadNotifications->count() - 1,
            'date_read' => date('d/m/Y H:i:s', strtotime(Auth::user()->notifications()->where('id', $request->id)->first()->read_at)),
            'check' => Auth::user()->unreadNotifications->count() - 1,
            'id' => Auth::user()->id,
        ]); 
    }

    public function render()
    {
        $notifications = Auth::user()->notifications()->orderBy('read_at', 'asc')->orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => 200,
            'id' => Auth::user()->id,
            'count' => Auth::user()->unreadNotifications->count() < 3 ? Auth::user()->unreadNotifications->count() : '3+',
            'check' => Auth::user()->unreadNotifications->count(),
            'data' => view('client.inc.notification', compact('notifications'))->render()
        ]);
    }
}
