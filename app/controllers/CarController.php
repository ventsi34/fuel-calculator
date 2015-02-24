<?php

class CarController extends \BaseController {
    
    protected $car;
    protected $user;
    
    public function __construct(Car $car, User $user) {
        $this->beforeFilter('auth');
        $this->car = $car;
        $this->user = $user;
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create()
   {
       return View::make('car.create');
   }


   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store()
   {
       $this->car->fill(Input::all());
       $this->car->user_id = Auth::id();
       if(!$this->car->validation()) {
           return Redirect::back()
                   ->withInput()
                   ->withErrors($this->car->getValidationMessage());
       }
       $this->car->create([
           'car_mark' => Input::get('car_mark'),
           'car_model' => Input::get('car_model'),
           'car_km' => Input::get('car_km'),
           'user_id' => Auth::id(),
       ]);
       $user = User::find(Auth::id());
       $user->has_car = 1;
       $user->save();
       return Redirect::to('/dashboard');
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
       $this->beforeFilter('have_car');
       $carInfo = $this->car->find(Auth::id());
       return View::make('car.edit')->withCar($carInfo);
   }


   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update($id)
   {
        $this->beforeFilter('have_car');
        $this->car->fill(Input::all());
        $this->car->user_id = Auth::id();
        if(!$this->car->validation()) {
            return Redirect::back()
                    ->withInput()
                    ->withErrors($this->car->getValidationMessage());
        }
        $car = Car::where("user_id", "=", Auth::id())->first();
        $car->car_mark = Input::get('car_mark');
        $car->car_model = Input::get('car_model');
        $car->car_km = Input::get('car_km');
        $car->save();
        return Redirect::to('/settings')
                ->withMessage('Your car was edited successful!');
   }

}
