<?php

class LoginController extends BaseController {
    protected $user;
    
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function create() {
        return View::make('login');
    }

    public function store() {
        if ($auth = Auth::attempt(Input::only('email', 'password'))) {
            return Redirect::to('/dashboard');
        }
        return Redirect::back()
                    ->withInput(Input::except('password'))
                    ->withError('Email or password is not correct!');;
    }
    
    public function destroy() {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }
}
