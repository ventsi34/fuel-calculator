<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Fuel extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'fuel';
        protected $primaryKey = 'fuel_id';
        protected $fillable = 
            ['quantity', 'trip', 'trip_type_id', 'fuel_station_id', 'car_id'];
        
        protected $validationRules = [
            'quantity' => 'sometimes|required',
            'trip' => 'sometimes|required',
            'trip_type_id' => 'sometimes|required|integer',
            'fuel_station_id' => 'sometimes|required|integer',
            'car_id' => 'required|integer'
        ];
        //array('sometimes', 'required', 'regex:/^[+-]?\d+\.\d+, ?[+-]?\d+\.\d+$/')
}
