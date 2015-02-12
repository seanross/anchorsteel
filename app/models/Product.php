<?php

class Product extends \Eloquent {
	protected $fillable = [];
        
        //One To Many
        public function orders(){
            return $this->hasMany('Order');
        }
        
        //Many To One
        public function warehouse(){
            return $this->belongsTo('Warehouse');
        }
        
        //Many To One
        public function manufacturer(){
            return $this->belongsTo('Manufacturer');
        }
        
        //Many To One
        public function category(){
            return $this->belongsTo('Category');
        }
        
        //One To Many
        public function images(){
            return $this->hasMany('Image');
        }
        
     
        public function getDatesAttribute($value)
        {
          $this->attributes['created_at'] = \Carbon\Carbon::createFromFormat('m/d/Y', $value);
        }
        
        public function getDiscountedPrice(){
            return $this->price - ($this->price * ($this->discount/100));
        }
        
}