<?php

class Transaction extends \Eloquent {
	protected $fillable = [];
        
        //One to Many
        public function products(){
            return $this->belongsToMany('Product');
        }
        
        //Many to 
        public function user(){
            return $this->belongsTo('User');
        }
        
}