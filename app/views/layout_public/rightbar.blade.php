
<div class="title_box">Search</div>
<div class="border_box">
  <input type="text" name="newsletter" class="newsletter_input" value="keyword"/>
  <a href="#" class="join">search</a> </div>
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
      <div class="prod_price"><span class="reduce"> {{$newproduct->price }}</span> <span class="price">{{ $newproduct->price - ($newproduct->price * ($newproduct->discount/100)) }}</span></div>
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
