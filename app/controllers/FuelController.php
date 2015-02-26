<?php

class FuelController extends \BaseController {
        
    protected $fuel;
    protected $car;
    
    public function __construct(Fuel $fuel, Car $car) {
        $this->beforeFilter('auth');
        $this->beforeFilter('have_car');
        $this->fuel = $fuel;
        $this->car = $car;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('fuel.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $carId = $this->car->getUserCarId(Auth::id());
        $data['chargesCount'] = 
                $this->fuel->where('car_id', '=', $carId)->count();
        $data['fuelStations'] = 
                FuelStation::lists('fuel_station_name', 'fuel_station_id');
        $data['tripType'] = TripType::lists('description', 'trip_type_id');
        return View::make('fuel.create')->withData($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        //Validation fail
        /*if(!$this->fuel->fill($input)->validation()) {
            return Redirect::back()
                    ->withInput()
                    ->withErrors($this->fuel->getValidationMessage());
        }*/
        $carId = $this->car->getUserCarId(Auth::id());
        $chargesCount = $this->fuel->where('car_id', '=', $carId)->count();
        if($chargesCount > 0) {
            $lastCharge = $this->fuel
                    ->where('car_id', '=', $carId)
                    ->orderBy('created_at', 'ASC')
                    ->first();
            $lastCharge->trip = Input::get('trip');
            $lastCharge->trip_type_id = Input::get('trip_type_id');
            $lastCharge->save();
        }
        //DB problem
        /*$this->fuel->create([
            'quantity' => Input::get('quantity'),
            'fuel_station_id' => Input::get('fuel_station_id'),
            'car_id' => $carId
        ]);*/
        $this->fuel->quantity = Input::get('quantity');
        $this->fuel->fuel_station_id = Input::get('fuel_station_id');
        $this->fuel->car_id = Input::get('car_id');
        $this->fuel->save();
        return Redirect::to('/fuel')
                ->withMessage('The fuel was added successfully!');
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
