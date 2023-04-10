<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function authenticated(){

        if(Auth::user()->is_super == '1')
        {
            return redirect('/dashboard');
        }
        elseif(Auth::user()->is_super == '0')
        {
            return redirect('/customerDashboard');
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:user')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }

    public function showUserLogin()
    {
        return view('auth.login', ['url' => 'user']);
    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::guard('user')->attempt(['email' => $request->email,
        'password' => $request->password], $request->get('remember')))
        {
            return redirect()->intend('/user');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showCustomerLogin()
    {
        return view('auth.login', ['url' => 'customer']);
    }

    public function customerLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email,
        'password' => $request->Customer_Password], $request->get('remember')))
        {
            return redirect()->intend('/customer');
        }
        return back()->withInput($request->only('email', 'remember'));
    }


}
