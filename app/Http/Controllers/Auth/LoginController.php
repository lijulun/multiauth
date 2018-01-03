<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function logout()
    {
        if (\Auth::guard('api')->check()) {
            $modelName = \Auth::guard('api')->user()->getTable();
            \Auth::guard('api')->user()->token()->delete();
            return response()->json(['message' => 'logout '. $modelName .' success', 'status_code' => 200]);
        }else{
            abort(401, 'Not authenticated');
        }
    }
}
