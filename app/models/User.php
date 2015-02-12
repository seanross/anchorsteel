<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use HasRole, UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

        
        //One to Many
        public function transactions(){
            return $this->hasMany('Transaction');
        }
        
        public function getFullName(){
            if(strlen($this->middlename)>0){
                return $this->firstname . " " . $this->middlename . " " . $this->lastname;
            } else {
                return $this->firstname . " " . $this->lastname;
            }
        }
        
}
