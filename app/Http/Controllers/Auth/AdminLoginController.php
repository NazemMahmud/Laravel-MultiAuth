<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Auth;

use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request){
        /**
         * Validate Form data
         */
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        /**
         * Attempt to log user in
         */
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],
            $request->remember)){
            /**
             * @If Successfull, redirect to intended location
             */
            return redirect()->intended(route('admin.dashboard'));
        }

        /**
         * @if Unsuccessfull, redirect back
         */
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

}
