<?php

class DashboardController extends \BaseController {
        
        protected $user;
        protected $fuel;
        protected $car;
        
        public function __construct(User $user, Fuel $fuel, Car $car) {
            $this->beforeFilter('auth');
            $this->beforeFilter('have_car');
            $this->user = $user;
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
            $averageConsumption = $this->fuel->getAverageConsumption($carId);
            return View::make('dashboard.index')
                    ->with('averageConsumption', $averageConsumption);
	}
}
