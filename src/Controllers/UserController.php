<?php namespace Faiz\Cms\Controllers;

use App,Input, View, Confide, Redirect;
use Illuminate\Support\MessageBag;

/**
 * UserController Class
 *
 * Implements actions regarding user management
 */
class UserController extends BaseController
{
    protected $whitelist = array(
        'create',
        'store',
        'login',
        'doLogin',
        'confirm',
        'forgotPassword',
        'doForgotPassword',
        'resetPassword',
        'doResetPassword',
        'logout'
    );
    
    /**
     * Displays the form for account creation
     *
     * @return  Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('admin.users.signup');
    }

    /**
     * Stores new account
     *
     * @return  Illuminate\Http\Response
     */
    public function store()
    {
        $repo = App::make('Faiz\Cms\User\UserRepository');
        $user = $repo->signup(Input::all());

        if ($user->id) {
            if (Config::get('confide::signup_email')) {
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_confirmation'),
                    compact('user'),
                    function ($message) use ($user) {
                        $message
                            ->to($user->email, $user->username)
                            ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                    }
                );
            }

            return Redirect::action('UserController@login')
                ->with('success', new MessageBag(array(Lang::get('confide::confide.alerts.account_created'))));
        } else {
            $error = $user->errors()->all(':message');

            return Redirect::action('UserController@create')
                ->withInput(Input::except('password'))
                ->with('errors', new MessageBag(array($error)));
        }
    }

    /**
     * Displays the login form
     *
     * @return  Illuminate\Http\Response
     */
    public function login()
    {
        if (\Confide::user()) {
            return Redirect::to('/');
        } else {
            return View::make('admin.users.login');
        }
    }

    /**
     * Attempt to do login
     *
     * @return  Illuminate\Http\Response
     */
    public function doLogin()
    {
        $repo = App::make('Faiz\Cms\User\UserRepository');
        $input = Input::all();

        if ($repo->login($input)) {
            return Redirect::intended('admin');
        } else {
            if ($repo->isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($repo->existsButNotConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::action('UserController@login')
                ->withInput(Input::except('password'))
                ->with('errors', new MessageBag(array($err_msg)));
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string $code
     *
     * @return  Illuminate\Http\Response
     */
    public function confirm($code)
    {
        if (Confide::confirm($code)) {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('UserController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
            return Redirect::action('UserController@login')
                ->with('errors', $error_msg);
        }
    }

    /**
     * Displays the forgot password form
     *
     * @return  Illuminate\Http\Response
     */
    public function forgotPassword()
    {
        return View::make('admin.users.forgot-password');
    }

    /**
     * Attempt to send change password link to the given email
     *
     * @return  Illuminate\Http\Response
     */
    public function doForgotPassword()
    {
        if (Confide::forgotPassword(Input::get('email'))) {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::action('UserController@login')
                ->with('success', new MessageBag(array($notice_msg)));
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
            return Redirect::action('UserController@doForgotPassword')
                ->withInput()
                ->with('errors', new MessageBag(array($error_msg)));
        }
    }

    /**
     * Shows the change password form with the given token
     *
     * @param  string $token
     *
     * @return  Illuminate\Http\Response
     */
    public function resetPassword($token)
    {
        return View::make('admin.users.reset-password')
                ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     * @return  Illuminate\Http\Response
     */
    public function doResetPassword()
    {
        $repo = App::make('Faiz\Cms\User\UserRepository');
        $input = array(
			'token'                 => Input::get('token'),
			'password'              => Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation'),
        );

        // By passing an array with the token, password and confirmation
        if ($repo->resetPassword($input)) {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('UserController@login')
                ->with('notice', new MessageBag(array($notice_msg)));
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::action('UserController@resetPassword', array('token'=>$input['token']))
                ->withInput()
                ->with('errors', new MessageBag(array($error_msg)));
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return  Illuminate\Http\Response
     */
    public function logout()
    {
        Confide::logout();

        return Redirect::to('/')->with('success', new MessageBag(array('Successfully logged out.')));
    }
}
