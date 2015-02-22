<?php

class FuelController extends \BaseController {
        
    protected $fuel;

    public function __construct(Fuel $fuel) {
        $this->beforeFilter('auth');
        $this->beforeFilter('have_car');
        $this->fuel = $fuel;
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
        if(!$this->fuel->fill($input)->validation()) {
            return Redirect::back()
                    ->withInput()
                    ->withErrors($this->fuel->getValidationMessage());
        }
        $this->fuel()->create([
            'quantity' => Input::get('quantity'),
            'trip' => Input::get('trip'),
            'trip_type_id' => Input::get('trip_type_id'),
            'fuel_station_id' => Input::get('fuel_station_id'),
            'car_id' => ''
        ]);
        return Redirect::to('/fuel')->withMessage('The fuel was added successfully!');
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
