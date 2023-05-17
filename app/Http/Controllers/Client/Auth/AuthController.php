<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {
        return view('client.login');
    }

    public function showRegister() {
        return view('client.register');
    }

    public function register(Request $request)
    {
        if($request->password === $request->repassword) {
            if (User::where('email', $request->email)->exists()) {
                toastr()->error('Email đã tồn tại');

                return redirect()->back()->withInput();
            } else {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
                toastr()->success('Đăng ký thành công');
    
                return redirect()->route('auth.show.login');
            }
        } else {
            toastr()->error('Mật khẩu không trùng khớp');

            return redirect()->back()->withInput();
        }
    }

    public function login(Request $request)
    {
        $result = Auth::attempt(['email' => $request->email, 'password' => $request->password], true);
        if ($result) {
            if (Auth::user()->status == 1) {
                toastr()->success('Đăng nhập thành công');

                return redirect()->route('client.home');
            } else {
                Auth::logout();
                toastr()->error('Tài khoản của bạn đã bị khóa, vui lòng liên hệ quản trị viên');

                return redirect()->back()->withInput();
            }
        } else {
            toastr()->error('Email / Mật khẩu không đúng, vui lòng đăng nhập lại');

            return redirect()->back()->withInput();
        }
    }

    public function showUpdateProfile()
    {
        $user = Auth::user();

        return view('client.update-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->introduce = $request->content;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->tiktok = $request->tiktok;
        $user->twitter = $request->twitter;
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $request->image->storeAs('/public/images/avatars', $request->image->getClientOriginalName());
                $user->avatar = '/storage/images/avatars/' . $request->image->getClientOriginalName();
            }
        }
        $user->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('auth.show.update.profile');
    }

    public function showUpdatePassword()
    {
        return view('client.update-password');
    }

    public function updatePassword($id, Request $request)
    {
        if (Hash::check($request->curpassword, Auth::user()->password)) {
            if ($request->newpassword == $request->confpassword) {
                User::where('id', $id)->update(['password' => bcrypt($request->newpassword)]);
                toastr()->success('Cập nhật thành công');
                Auth::logout();
        
                return redirect()->route('auth.show.login');
            } else {
                toastr()->error('Mật khẩu không khớp');
                return redirect()->back();
            }
        } else {
            toastr()->error('Mật khẩu hiện tại không đúng');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        toastr()->success('Đăng xuất thành công');

        return redirect()->route('auth.show.login');
    }
}
