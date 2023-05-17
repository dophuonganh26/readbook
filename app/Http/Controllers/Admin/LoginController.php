<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class LoginController extends Controller
{
     /**
     * Show the user form login
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $result = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], true);

        if ($result) {
            toastr()->success('Đăng nhập thành công');

            return redirect()->route('dashboard');
        } else {
            toastr()->error('Email / Mật khẩu không đúng');
            
            return redirect()->back();
        }
    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        toastr()->success('Đăng xuất thành công');

        return redirect()->route('admin.form.login');
    }

    public function showUpdatePasswordForm()
    {
        return view('admin.auth.update-password');
    }

    public function updatePassword($id, Request $request)
    {
        if (Hash::check($request->curpassword, Auth::guard('admin')->user()->password)) {
            if ($request->newpassword == $request->confpassword) {
                Admin::where('id', $id)->update(['password' => bcrypt($request->newpassword)]);
                toastr()->success('Cập nhật thành công');
                Auth::guard('admin')->logout();
        
                return redirect()->route('admin.form.login');
            } else {
                toastr()->error('Mật khẩu không khớp');
                return redirect()->back();
            }
        } else {
            toastr()->error('Mật khẩu hiện tại không đúng');
            return redirect()->back();
        }
    }

    public function showUpdateAvatarForm()
    {
        return view('admin.auth.update-avatar');
    }

    public function updateAvatar($id, Request $request)
    {
        $admin = Admin::find($id);
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $request->image->storeAs('/public/images/avatars', $request->image->getClientOriginalName());
                $admin->avatar = '/storage/images/avatars/' .  $request->image->getClientOriginalName();
                $admin->save();
            }
        }
        toastr()->success('Cập nhật thành công');

        return redirect()->back();
    }
}