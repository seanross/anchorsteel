<?php

class Transaction extends \Eloquent {
	protected $fillable = [];
        
        //One to Many
        public function orders(){
            return $this->hasMany('Order');
        }
        
        //Many to One
        public function user(){
            return $this->belongsTo('User');
        }
        
        public function getTotalQuantity(){
            return $this->orders->sum('quantity');
        }
        
        public function getGrandTotal(){
            return $this->orders->sum('price') * $this->orders->sum('quantity');
        }
        
}