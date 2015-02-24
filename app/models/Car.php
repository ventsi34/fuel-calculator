<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Car extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'cars';
        protected $primaryKey = 'car_id';
        protected $fillable = 
            ['car_mark', 'car_model', 'car_km', 'user_id'];
        public $timestamps = false;
        protected $validationRules = [
            'car_mark' => 'sometimes|required|string',
            'car_model' => 'sometimes|required|string',
            'car_km' => 'sometimes|required|integer',
            'user_id' => 'sometimes|required|integer'
        ];
}
