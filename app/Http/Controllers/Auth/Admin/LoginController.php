<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller{
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
    protected $redirectTo = '/MyControlPanel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.admin.login');
    }

    public function login(Request $request){

        $request->validate([
            'email'    => 'required|email',
            'password'    => 'required',
        ]);

//        Find user By this email
        $admin = Admin::where('email',$request->email)->first();

        if (!isset($admin)) {
            session()->flash('errormsg', 'Hello! You are not registered. Please Register First');
            return redirect()->route('admin.login');
        }elseif ($admin->status == 1) {
//            log him now
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                return redirect()->intended(route('admin.index'));
            }else {
                session()->flash('errormsg', 'Password Was Wrong!!!Please Enter Right Password And Try Again');
                return redirect()->route('admin.login');

            }
        }elseif ($admin->status == 0){
            session()->flash('errormsg', 'Your Email is not verifyed. Please check your email and verify your email');
            return redirect()->route('admin.login');
        }elseif ($admin->status == 2){
            session()->flash('errormsg', 'Your Blocked. Please Contact With Super Admin');
            return redirect()->route('admin.login');
        }else {
            session()->flash('errormsg', 'Something wents wrong!!!Please try again');
            return redirect()->route('admin.login');

        }
    }

    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->invalidate();

        Auth::logout();

        return redirect()->route('admin.login');
    }
}
