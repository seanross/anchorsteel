<?php

class Warehouse extends \Eloquent {
	protected $fillable = [];
        
        //One to Many
        public function products(){
            return $this->hasMany('Product');
        }
        
}