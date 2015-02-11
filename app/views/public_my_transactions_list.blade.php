@extends('layout_public.template')
@section('content')

      <div class="center_title_bar">My Transactions</div>
      <div class="prod_box_big">
          @foreach ($transactions as $t)
            <div class="center_prod_box_big">
              
              <div class="details_big_box">
                <!--<div class="product_title_big">{{ $t->id }}</div>-->
                <div class="specifications"> 
                  Order Date :<span class="blue"> {{ $t->updated_at }}</span><br />
                  Status: <span class="blue">{{ $t->status }}</span><br />
                  Number of items: <span class="price">{{ $t->orders->sum('quantity') }} </span><br/>
                  Total Price: <span class="price">{{ $t->orders->sum('price') }} PHP</span><br/>
                </div>
                <a href="{{ url('/my/transactions/view/'. $t->id) }}" class="prod_buy">View Orders</a>
              </div>
                
            </div>
           @endforeach
      </div>
    
@stop