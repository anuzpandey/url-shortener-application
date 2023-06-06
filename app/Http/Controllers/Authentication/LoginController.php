<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\PasswordReset;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Permission\PermissionRegistrar;

class LoginController extends Controller
{
    public function index()
    {
        $this->setPageTitle('Login', 'Please enter your email and password to login.');

        return view('authentication.login');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->only('email', 'password'), $request->get('remember_me'))) {

            $authenticatedUser = Auth::user();

            if ($authenticatedUser === NULL) {
                return $this->responseRedirectBack('Invalid Email or Password', 'error', true, true);
            }

            return $this->responseRedirect(route('cms.dashboard.index'), 'Welcome ' . $authenticatedUser->name);
        }

        return $this->responseRedirectBack('Invalid Email or Password', 'error', true, true);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return $this->responseRedirect('authentication.login.index', 'Logged out successfully', 'success');
    }
}
