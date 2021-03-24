<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\VerifyRegistration;
use Illuminate\Http\Request;
use File;
use Auth;
use Intervention\Image\Facades\Image as Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public $image;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('auth:admin');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(){
        if (Auth::user()->role == 'Super-Admin' || Auth::user()->role == 'Admin') {
            return view('auth.admin.register');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request){
        $request->validate([
        'name' => 'required|max:255|string',
        'username' => 'required|max:255|string|unique:admins',
        'email' => 'required|string|email|string|unique:admins',
        'password' => 'required|min:8|string|confirmed',
        'role' => 'required|string',
        'phone' => 'nullable|numeric|unique:admins',
        'image' => 'nullable|image',
    ]);
        if ($request->image >0){
            $image = $request->file('image');
            $image_name = 'neershop'.'-'.'admin'.$request->name.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/admins/'.$image_name);
            Image::make($image)->save($location);
            $this->image = $image_name;
        }

        $admin = Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'image' => $this->image,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request['password']),
            'remember_token' => str_random(50),
            'status' => 0,
            'slug' => str_slug($request->username),
        ]);

        $admin->notify(new VerifyRegistration($admin,$admin->remember_token));

        session()->flash('success','A confirmation message has sent to the new admins Email');
        return redirect()->route('admin.list');
    }
}
