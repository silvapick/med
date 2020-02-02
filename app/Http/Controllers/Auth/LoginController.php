<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function form_login()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
         Validator::make($request->all(), [
            $this->username() => 'required|numeric',
            'password' => 'required|string',
        ])->validate();

        if (Auth::attempt([$this->username() => $request->cedula, 'password' => $request->password, 'estado' => 1])) {
            // Authentication passed...
            return redirect()->intended('home');
        }
        return back()
            ->withErrors(['password' => 'Usuario y/o contraseña erroneos o Usuario Inactivo'])
            ->withInput(request([$this->username()]));
    }

    public function username()
    {
        return 'cedula';
    }
}
