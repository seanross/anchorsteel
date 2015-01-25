<?php

class Transaction extends \Eloquent {
	protected $fillable = [];
        
        //One to Many
        public function products(){
            return $this->belongsToMany('Product');
        }
        
}