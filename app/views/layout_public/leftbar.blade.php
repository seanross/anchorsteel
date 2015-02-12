<div class="title_box">Categories</div>
<ul class="left_menu">
  @foreach($categorylistmenu as $index => $item)
      @if($index % 2 != 0)
          <li class="even">
      @else
          <li class="odd">
      @endif 
      <a href="{{ URL::to('product/list/'. $item->id) }}">{{$item->name}}</a></li>
  @endforeach
</ul>
<div class="title_box">Featured</div>
<div class="border_box">
    @if($featuredproduct != null)
      <div class="product_title"><a href="{{ url('/product/view/'. $featuredproduct->id) }}"> {{ $featuredproduct->name }} </a></div>
      <div class="product_img"><a href="{{ url('/product/view/'. $featuredproduct->id) }}"><img src="{{ asset($featuredproduct->images->random(1)->name) }}" alt="" border="0" /></a></div>
      <div class="prod_price">
          @if($featuredproduct->discount > 0)
          <span class="reduce"> {{$featuredproduct->price }}</span> 
          <span class="price">{{ $featuredproduct->getDiscountedPrice() }} PHP</span>
          @else
          <span class="price"> {{$featuredproduct->price }} PHP</span>
          @endif
      </div>
    @else
      Not Available.
    @endif        
</div>
<div class="title_box">Newsletter</div>
<div class="border_box">
  <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
  <a href="#" class="join">subscribe</a> </div>
<div class="banner_adds"> <a href="#"><img src="{{ asset('ad1.jpg') }}" alt="" border="0" height="167" width="167"/></a> </div>
