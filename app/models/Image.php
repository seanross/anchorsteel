<?php

class Image extends \Eloquent {
	protected $fillable = [];
        
        //Many to One
        public function product(){
            return $this->belongsTo('Product');
        }
}