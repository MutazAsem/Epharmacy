<?php

namespace App\Actions\Jetstream;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $user = Auth::user();
        // تحديد المسار الجديد بناءً على دور المستخدم، إذا كنت تستخدم Laratrust أو نظام أدوار آخر
        $redirectPath = '/admin_dashboard';

        return redirect()->intended($redirectPath);
    }
}
