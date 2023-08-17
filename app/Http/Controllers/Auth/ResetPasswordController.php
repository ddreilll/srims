<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::LOGIN;



    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        $password_resets = DB::table('password_resets')->where('email', $request->email)->first();
        if ($password_resets && Hash::check($token, $password_resets->token)) {
            $createdAt = Carbon::parse($password_resets->created_at);

            if (Carbon::now()->greaterThan($createdAt->addMinutes(config('auth.passwords.users.expire')))) {
                return view('auth.passwords.reset')->with(
                    ['message' => __(Password::INVALID_TOKEN), 'validToken' => false]
                );
            }
        } else {
            return view('auth.passwords.reset')->with(
                ['message' => __(Password::INVALID_TOKEN), 'validToken' => false]
            );
        }

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email, 'validToken' => true]
        );
    }


    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => [
                'required', 'confirmed', 'string',
                'min:' . config('panel.password.min'),
                config('panel.password.lowercase') == "on" ? 'regex:/[a-z]/' : '',
                config('panel.password.uppercase') == "on" ? 'regex:/[A-Z]/' : '',
                config('panel.password.digits') == "on" ? 'regex:/[0-9]/' : '',
                config('panel.password.special') == "on" ? 'regex:/[@$!%*#?&]/' : '',
            ],
        ];
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        if ($user = User::where('email', $request->email)->first()) {
            if (!$user->is_approved) {
                return $this->sendResetFailedResponse($request, 'Unable to proceed, your account is not yet approved.');
            } else if (!$user->is_active) {
                return $this->sendResetFailedResponse($request, 'Unable to proceed, your account is deactivated.');
            }
        }

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($request, $response)
            : $this->sendResetFailedResponse($request, $response);
    }


    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->save();

        event(new PasswordReset($user));
    }
}
