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
            'quantity' => 
                array('sometimes', 'required', 'regex:/^\d*(\.\d{1,2})?$/', 'min:1'),
            'trip' => 'sometimes|required|integer|min:1',
            'trip_type_id' => 'sometimes|required|integer',
            'fuel_station_id' => 'sometimes|required|integer',
            'car_id' => 'required|integer'
        ];
        
        public function validation() {
            if(!parent::validation()) {
                return false;
            }
            if(isset($this->quantity)) {
                if(!$this->quantity > 0) {
                    $this->validationMessage['quantity'] = 
                                                ["Invalid value of quantity!"];
                    return false;
                }
            }
            return true;
        }
}
