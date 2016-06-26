<?php namespace freshwax\Http\Controllers\Auth;

use Auth;
use Cookie;
use Session;

use freshwax\Models\User;
use freshwax\Http\Requests\LoginRequest;
use freshwax\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
//might need Validator facade and User model here

class AuthController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
     */
    protected $redirectTo = '/home';
    protected $loginPath = '/login';

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout','getLogout']]);
    }

    /**
     *   * Get a validator for an incoming registration request.
     *        *
     *            * @param  array  $data
     *                * @return \Illuminate\Contracts\Validation\Validator
     *                    */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     *    * Create a new user instance after a valid registration.
     *       *
     *           * @param  array  $data
     *               * @return User
     *                   */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function login(LoginRequest $request)
    {
        if($request->has('remember') && Auth::viaRemember()){
            return redirect()->intended("/");
        }
        $success = Auth::attempt(["email"=>$request->email, "password"=>$request->password], false);
        if($success){
            return redirect()->intended("/");
        }
        return redirect($this->loginPath)
            ->withInput($request->only('username', 'remember'))
            ->withErrors([
                'username' => $this->getFailedLoginMessage(),
                ]);
    }

    public function logout()
    {
        $forgetMe = Cookie::forget(Auth::getRecallerName());
        Auth::logout();
        Session::flush();
        return redirect('/')->withCookie($forgetMe);
    }

    public function showRegistrationForm()
    {
        $users = User::all();
        return view('users.create', compact('users'));
    }
}
