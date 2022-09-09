<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function vendorLogout(Request $request)
    {
        auth()->guard('vendor')->logout();
        return redirect()->route('vendor.login');
    }

    public function userLogout(Request $request)
    {
        auth()->guard('web')->logout();
        return redirect()->route('app.index');
    }
}
