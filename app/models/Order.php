<?php

class Order extends \Eloquent {
	protected $fillable = [];
        
        //Many To One
        public function transaction(){
            return $this->belongsTo('Transaction');
        }
        
        //Many to One
        public function product(){
            return $this->belongsTo('Product');
        }
}