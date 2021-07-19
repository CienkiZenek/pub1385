<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }


    /*public function verify(Request $request){
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember  = ( !empty( $request->remember ) )? TRUE : FALSE;

        if(Auth::attempt($credential)){
            $user = User::where(["email" => $credential['email']])->first();

            Auth::login($user, $remember);

            return redirect(route('stronaGlowne'));
        }
    }*/

    /*public function login(Request $request)
    {
        $this->validateLogin($request);
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }*/


    protected function authenticated(Request $request, $user)
    {
       if($user->stan==='Aktywny')
       {
           session()->flash('komunikat', "Użytkownik {$user->name} - poprawne zalogowanie! ");

       }
       if($user->stan==='Zawieszony') {
           session()->flash('komunikat', "Konto użytkownika: {$user->name} jest zawieszone!");
       }

       if($user->stan==='Usunięty') {
           session()->flash('komunikat', "Konto użytkownika: {$user->name} zostało usunięte");
           Auth::logout();
           return redirect(route('stronaGlowne'));
       }
    }

    protected function loggedOut(Request $request)
    {
        //echo 'BBBB';
        session()->flash('komunikat', "Wylogowano!");
    }
}
