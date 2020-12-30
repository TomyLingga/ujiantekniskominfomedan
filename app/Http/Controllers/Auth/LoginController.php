<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;




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
    protected $redirectTo;
    
    public function redirectTo()
    {
        // \dd(Auth::user()->roles);
        switch(Auth::user()->id){
            case "1";
            $this->redirectTo = route('admin_index');
            return $this->redirectTo;
            break;
            default:
            $this->redirectTo = route('index_ktp');
            return $this->redirectTo;
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
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);
    }
}
