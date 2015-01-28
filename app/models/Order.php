<?php

class Order extends \Eloquent {
	protected $fillable = [];
        
        //Many to One
        public function transactions(){
            return $this->belongsTo('Transaction');
        }
}