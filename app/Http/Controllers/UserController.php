<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $rentLogs = RentLog::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('auth.profile', [
            'rent_logs' => $rentLogs
        ]);
    }

    public function index()
    {
        $user = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user.index', [
            'user' => $user
        ]);
    }

    public function registerUser()
    {
        $register = User::where('role_id', 2)->where('status', 'inactive')->get();
        return view('user.register-user', [
            'register' => $register
        ]);
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        $rentLogs = RentLog::with(['user', 'book'])->where('user_id', $user->id)->get();

        return view('user.detail', [
            'user' => $user,
            'rent_logs' => $rentLogs,
        ]);
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();

        return redirect('user-details/' . $slug)->with('status', 'User Approved Success');
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();

        return redirect()->route('users')->with('status', 'User Berhasil Di Hapus');
    }
}
