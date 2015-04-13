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
        $carId = $this->car->getUserCarId(Auth::id());
        $sql = 'SELECT 
                    f.`fuel_id`,
                    f.`quantity`,
                    f.`trip`,
                    c.`car_mark`,
                    c.`car_model`,
                    t.`description` as `trip_type`,
                    s.`fuel_station_name`
                FROM `fuel` as `f`
                LEFT JOIN `cars` as `c`
                    ON `c`.`car_id`=`f`.`car_id`
                LEFT JOIN `trip_types` as `t`
                    ON t.`trip_type_id` = f.`trip_type_id`
                LEFT JOIN `fuel_stations` as `s`
                    ON s.`fuel_station_id` = f.`fuel_station_id`
                WHERE
                    `f`.`is_created` = 1
                    AND
                    `f`.`car_id` = '.$carId.'
                ORDER 
                    BY `created_at` DESC';
        $res = DB::select(DB::raw($sql));
        $lastCharge = $this->fuel
                    ->where('car_id', '=', $carId)
                    ->where('is_created', '=', 0)
                    ->orderBy('created_at', 'DESC')
                    ->first();
        $lastQuantity = 0;
        if(!empty($lastCharge)){
            $lastQuantity = $lastCharge->quantity;
        }
        return View::make('fuel.index')
                ->withTrips($res)
                ->withFuel($lastQuantity);
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
     * Store a newly fuel in db
     *
     * @return Redirect to index page
     */
    public function store()
    {
        $input = Input::all();
        $carId = $this->car->getUserCarId(Auth::id());
        $input['car_id'] = $carId;
        $this->fuel->quantity = Input::get('quantity');
        $this->fuel->fuel_station_id = Input::get('fuel_station_id');
        $this->fuel->car_id = $carId;
        if(!$this->fuel->validation()) {
            return Redirect::back()
                    ->withInput()
                    ->withErrors($this->fuel->getValidationMessage());
        }
        $chargesCount = $this->fuel->where('car_id', '=', $carId)->count();
        if($chargesCount > 0) {
            $lastCharge = $this->fuel
                    ->where('car_id', '=', $carId)
                    ->where('is_created', '=', 0)
                    ->orderBy('created_at', 'DESC')
                    ->first();
            $lastCharge->trip = Input::get('trip');
            $lastCharge->trip_type_id = Input::get('trip_type_id');
            $lastCharge->is_created = 1;
            if(!$lastCharge->validation()) {
                return Redirect::back()
                   ->withInput()
                   ->withErrors($lastCharge->getValidationMessage());
            }
            $lastCharge->save();
        }
        $this->fuel->save();
        return Redirect::to('/fuel')
                ->withMessage('The fuel was added successfully!');
    }
}
