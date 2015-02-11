@extends('layout_public.template')
@section('content')

    <div class="oferta"> <img src="{{ asset('sample.jpg') }}" width="165" height="113" border="0" class="oferta_img" alt="" />
      <div class="oferta_details">
        <div class="oferta_title">Trusses po for sale!</div>
        <div class="oferta_text"> In engineering, a truss is a structure that "consists of two-force members only, where the members are organized so that the assemblage as a whole behaves as a single object </div>
        <a href="#" class="prod_buy">details</a> </div>
    </div>

    @if($newproducts != null)
    <div class="center_title_bar">Latest Products</div>
      @foreach($newproducts as $newproduct)
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="{{ url('/product/view/'. $newproduct->id) }}"> {{$newproduct->name}} </a></div>
          <div class="product_img"><a href="{{ url('/product/view/'. $newproduct->id) }}"><img src="{{ $newproduct->images->random(1)->name }}" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce"> {{$newproduct->price }}</span> <span class="price">{{ $newproduct->price - ($newproduct->price * ($newproduct->discount/100)) }}</span></div>
        </div>
        <div class="prod_details_tab"> <a href="{{ asset('cart/add/'. $newproduct->id)}}" class="prod_buy">Add to Cart</a> <a href="#" class="prod_details">Details</a> </div>
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
            <div class="prod_price"><span class="reduce"> {{$featuredproduct->price }}</span> <span class="price">{{ $featuredproduct->price - ($featuredproduct->price * ($featuredproduct->discount/100)) }}</span></div>
          </div>
          <div class="prod_details_tab"> <a href="{{ asset('cart/add/'. $featuredproduct->id)}}" class="prod_buy">Add to Cart</a> <a href="#" class="prod_details">Details</a> </div>
        </div>
      @endforeach
    @endif
    
@stop