<?php

class RegisterController extends \BaseController {
        
        protected $user;
    
        public function __construct(User $user) {
            $this->beforeFilter('guest');
            $this->user = $user;
        }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            return View::make('register');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $input = Input::all();
            if(!$this->user->fill($input)->validation()) {
                return Redirect::back()
                    ->withInput(Input::except('password', 'repassword'))
                    ->withErrors($this->user->getValidationMessage());
            }
            $this->user->create([
                'email' => Input::get('email'),
                'password' => Hash::make(Input::get('password'))]);
            return Redirect::to('/register')
                    ->with('message', 'Your registration was successful created!');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
