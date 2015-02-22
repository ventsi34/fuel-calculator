<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
        protected $primaryKey = 'user_id';
        protected $fillable = ['email', 'password', 'repassword'];
        
        protected $validationRules = [
            'email' => 'sometimes|required|email|unique:users,email',
            'password' => 'sometimes|required|min:4|max:20',
            'repassword' => 'sometimes|required|min:4|max:20|same:password',
        ];
        /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
}
