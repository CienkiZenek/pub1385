<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Http\Request;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

   /*     dd($data);*/
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'zgoda_regulamin' => ['accepted'],
            'captcha' => 'required|captcha'

        ]);
    }

    /**
     * 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
     * 'password' => ['required', 'string', 'min:8', 'confirmed'],
    'zgoda_regulamin' => ['required'],
    'captcha' => 'required|captcha'
     *
     *
     * 'zgoda_regulamin' => ['required'],
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */



    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'ranga' => 'Początkujący',
            'uprawnienia' => 'Czytelnik',
            'stan' => 'Aktywny',
            'izsk_warunek' => false,
            'izsk' => 'Nie',
            'zgoda_listy_red' => false,
            'zgoda_listy_innych' => false,
            'zgoda_regulamin' => true,
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function registered(Request $request, $user)
    {
        session()->flash('komunikat', "Zostałeś zrejestrowany! Na podany adres została wysłana wiadomość z prośbą o potwierdzenie adresu email. Należy postępować zgodnie z zwartymi tam wskazówkami");
    }
}
