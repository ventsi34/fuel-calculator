<?php

class SettingsController extends \BaseController {
    
    protected $user;
    protected $car;
    
    public function __construct(Car $car, User $user) {
        $this->beforeFilter('auth');
        $this->beforeFilter('have_car');
        $this->car = $car;
        $this->user = $user;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $carInfo = $this->car->find(Auth::id());
        return View::make('settings.index')
                ->withCar($carInfo);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return View::make('settings.edit');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $this->user->fill(Input::all());
        if(!$this->user->validation()) {
            return Redirect::back()
                    ->withInput()
                    ->withErrors($this->user->getValidationMessage());
        }
        $checkPassword = 
            User::where('user_id', '=', Auth::id())
            ->where('password', '=', Hash::make(Input::get('old_password')))
            ->count();
        //$queries = DB::getQueryLog();
        //return end($queries);
        //return $checkPassword;
        if($checkPassword != 1) {
            
        }
    }

}
