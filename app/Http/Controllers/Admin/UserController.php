<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }

    public function disable($id)
    {
        User::where('id',$id)->update(['status' => 0]);
        toastr()->success('Khóa thành công');

        return redirect()->back();
    }

    public function enable($id)
    {
        User::where('id',$id)->update(['status' => 1]);
        toastr()->success('Mở khóa thành công');

        return redirect()->back();
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show', compact('user'));
    }
}
