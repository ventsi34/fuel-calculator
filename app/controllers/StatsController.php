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
        if($defaultFilter === 'average') {
            $data['averageConsumption'] = 
                    $this->fuel->getAverageConsumption($carId);
        }
        return View::make('stats.index')
                ->with('defaultFilter', $defaultFilter)
                ->withData($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        
    }
}
