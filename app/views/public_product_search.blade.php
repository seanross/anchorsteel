@extends('layout_public.template')
@section('content')


      <div class="center_title_bar">Search a Product</div>
      <div class="prod_box_big">
          @if($products != null)
          
          @foreach ($products as $p)
            <div class="center_prod_box_big">
             
              <div class="details_big_box">
                <div class="product_title_big">{{ $p->name }}</div>
                <div class="specifications"> Available: <span class="blue">{{ $p->stock }} In stock</span><br />
                  Description :<span class="blue"> {{ $p->profile }} </span><br />
                </div>
                @if($p->stock > 0)
                    
                    @else
                      SORRY! OUT OF STOCK.
                    @endif
                  <a href="{{ url('/product/view/'. $p->id) }}" class="prod_details">Details</a>
              </div>
                
            </div>
           @endforeach
           
           @endif
      </div>
    
@stop