<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Services\UserService;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * @var Guard
     */
    private $auth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('guest');
        $this->auth = $auth;
    }

    public function register(UserRegisterRequest $request, UserService $userService)
    {
        $user = $userService->registerUser($request->validated());

        $this->auth->login($user);

        return redirect($this->redirectTo);
    }
}
