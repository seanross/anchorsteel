
<div class="title_box">Search</div>
<div class="border_box">
  {{ Form::open(array('url' => 'product/search')) }}

  {{ Form::text('search_prod', '', array('class' => 'newsletter_input')) }}
  {{ Form::submit('Search') }}
  {{ Form::close() }}
</div>
  @if(Auth::check())
    <div class="shopping_cart">
      <div class="title_box">Shopping cart</div>
      <div class="cart_details"> {{ Cart::count() }} items <br />
        <span class="border_cart"></span> Total: <span class="price">{{ Cart::total() }}</span> </div>
      <div class="cart_icon"><a href="{{ asset('cart/list')}}"><img src="{{ asset('images/shoppingcart.png') }}" alt="" width="35" height="35" border="0" /></a></div>
    </div>
  @endif
<div class="title_box">New</div>
<div class="border_box">
    @if($newproduct != null)
      <div class="product_title"><a href="{{ url('/product/view/'. $newproduct->id) }}"> {{$newproduct->name}} </a></div>
      <div class="product_img"><a href="{{ url('/product/view/'. $newproduct->id) }}"><img src="{{ asset($newproduct->images->random(1)->name) }}" alt="" border="0" /></a></div>
      <div class="prod_price">
          @if($newproduct->discount > 0)
          <span class="reduce"> {{$newproduct->price }}</span> 
          <span class="price">{{ $newproduct->getDiscountedPrice() }} PHP</span>
          @else
          <span class="price"> {{$newproduct->price }} PHP</span>
          @endif
      </div>
    @else
      Not Available.
    @endif
</div>
<div class="title_box">Manufacturers</div>
<ul class="left_menu">
  @foreach($manufacturerlistmenu as $index => $item)
      @if($index % 2 != 0)
          <li class="even">
      @else
          <li class="odd">
      @endif 
      <a href="{{ URL::to($item->website) }}">{{$item->name}}</a></li>
  @endforeach
</ul>
<div class="banner_adds"> <a href="#"><img src="{{ asset('ad2.jpg') }}" alt="" border="0" height="220" width="124"/></a> </div>
