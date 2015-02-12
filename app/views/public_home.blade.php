@extends('layout_public.template')
@section('content')

    @if($featuredproduct != null)
        <div class="oferta"> <img src="{{ asset($featuredproduct->images->random(1)->name) }}" width="165" height="113" border="0" class="oferta_img" alt="" />
          <div class="oferta_details">
            <div class="oferta_title">{{ $featuredproduct->name }}</div>
            <div class="oferta_text"> {{ $featuredproduct->profile }}</div>
            <a href="{{ url('/product/view/'. $featuredproduct->id) }}" class="prod_details">Details</a> 
          </div>
        </div>
    @endif
    
    @if($newproducts != null)
    <div class="center_title_bar">Latest Products</div>
      @foreach($newproducts as $newproduct)
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="{{ url('/product/view/'. $newproduct->id) }}"> {{$newproduct->name}} </a></div>
          <div class="product_img"><a href="{{ url('/product/view/'. $newproduct->id) }}"><img src="{{ $newproduct->images->random(1)->name }}" alt="" border="0" /></a></div>
          <div class="prod_price">
                @if($newproduct->discount > 0)
                <span class="reduce"> {{$newproduct->price }}</span> 
                <span class="price">{{ $newproduct->getDiscountedPrice() }} PHP</span>
                @else
                <span class="price"> {{$newproduct->price }} PHP</span>
                @endif
          </div>
        </div>
        <div class="prod_details_tab"> 
            @if($newproduct->stock > 0)
            <a href="{{ asset('cart/add/'. $newproduct->id)}}" class="prod_buy">Add to Cart</a> 
            @else
                OUT of STOCK
            @endif
            <a href="{{ url('/product/view/'. $newproduct->id) }}" class="prod_details">Details</a> 
        </div>
      </div>
      @endforeach
    @endif      

    @if($featuredproducts != null)
    <div class="center_title_bar">Recomended Products</div>
      @foreach($featuredproducts as $featuredproduct)
        <div class="prod_box">
          <div class="center_prod_box">
            <div class="product_title"><a href="{{ url('/product/view/'. $featuredproduct->id) }}"> {{$featuredproduct->name}} </a></div>
            <div class="product_img"><a href="{{ url('/product/view/'. $featuredproduct->id) }}"><img src="{{ $featuredproduct->images->random(1)->name }}" alt="" border="0" /></a></div>
            <div class="prod_price">
                @if($featuredproduct->discount > 0)
                <span class="reduce"> {{$featuredproduct->price }}</span> 
                <span class="price">{{ $featuredproduct->getDiscountedPrice() }} PHP</span>
                @else
                <span class="price"> {{$featuredproduct->price }} PHP</span>
                @endif
            </div>
          </div>
          <div class="prod_details_tab"> 
              @if($featuredproduct->stock > 0)
              <a href="{{ asset('cart/add/'. $featuredproduct->id)}}" class="prod_buy">Add to Cart</a> 
              @else
                OUT of STOCK
              @endif
              <a href="{{ url('/product/view/'. $featuredproduct->id) }}" class="prod_details">Details</a> 
          </div>
        </div>
      @endforeach
    @endif
    
@stop