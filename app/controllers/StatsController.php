<?php

class StatsController extends \BaseController {
    
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
        switch (Input::get('filter_type')) {
            case 'average':
                $defaultFilter = 'average';
                break;
            case 'byStation':
                $defaultFilter = 'byStation';
                break;
            default:
                $defaultFilter = 'average';
                break;
        }
        $carId = $this->car->getUserCarId(Auth::id());
        $data = [];
        $data['defaultFilter'] = $defaultFilter;
        $color = ['#F7464A', '#46BFBD', '#FDB45C'];
        $highlight = ['#FF5A5E', '#5AD3D1', '#FFC870'];
        if($defaultFilter === 'average') {
            $data['averageConsumption'] = 
                    $this->fuel->getAverageConsumption($carId);
            $averageConsumptions = $this->fuel
                ->select(DB::raw(
                    'AVG(`trip` / `quantity`) as `value`,'.
                    'trip_types.description as `label`'
                ))
                ->join('trip_types', 'trip_types.trip_type_id', '=', 'fuel.trip_type_id')
                ->where('is_created', '=', '1')
                ->where('car_id', '=', $carId)
                ->groupBy('fuel.trip_type_id')
                ->get();
            foreach ($averageConsumptions as $key => $averageConsumption) {
                $averageConsumptions[$key]['color'] = $color[$key];
                $averageConsumptions[$key]['highlight'] = $color[$key];
            }
            $data['chartData'] = $averageConsumptions;
        } elseif($defaultFilter === 'byStation') {
            $fuel_station_id = Input::get('fuel_station_id');
            if(!isset($fuel_station_id)) {
                $fuel_station_id = 1;
            }
            $averageConsumptions = $this->fuel
                ->select(DB::raw(
                    'AVG(`trip` / `quantity`) as `value`,
                    fuel_stations.fuel_station_name as stationName,
                    fuel_stations.fuel_station_id as stationId'
                ))
                ->join('fuel_stations', 'fuel_stations.fuel_station_id', '=', 'fuel.fuel_station_id')
                ->where('is_created', '=', '1')
                ->where('car_id', '=', $carId)
                ->where('fuel.trip_type_id', '=', $fuel_station_id)
                ->groupBy('fuel.fuel_station_id')
                ->get();
            $data['fuel_station_id'] = $fuel_station_id;
            $data['labels'] = [];
            $data['averageValue'] = [];
            $data['color'] = $color[$fuel_station_id - 1];
            $data['highlight'] = $highlight[$fuel_station_id - 1];
            foreach ($averageConsumptions as $item) {
                $data['labels'][] = $item['stationName'];
                $data['averageValue'][] = round($item['value'], 2);
            }
            $data['labels'] = json_encode($data['labels']);
            $data['averageValue'] = json_encode($data['averageValue']);
            $data['tripType'] = TripType::lists('description', 'trip_type_id');
        }
        return View::make('stats.index')->withData($data);
    }
}
