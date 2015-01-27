<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Anchor Steel</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="{{ asset('style.css') }} " />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="{{ asset('iecss.css') }}" />
<![endif]-->
<script type="text/javascript" src="{{ asset('js/boxOver.js') }}" ></script>


</head>
<body>
<div id="main_container">
  <div id="header">
    <div class="top_right">
      <div class="languages">
        <div class="lang_text">Languages:</div>
        <a href="#" class="lang"><img src="{{ asset('en.gif') }}" alt="" border="0" /></a> <a href="#" class="lang"><img src="{{ asset('ph.gif') }}" alt="" border="0" /></a> </div>
      <div class="big_banner"> <a href="#"><img src="{{ asset('as.jpg') }}" alt="" border="0" /></a> </div>
    </div>
    {{--<div id="logo"> <a href="#"><img src="{{ asset('qw.jpg') }}" alt="" border="0" width="182" height="85" /></a> </div>--}}
  </div>
  <div id="main_content">
    <div id="menu_tab">
      <ul class="menu">
        <li><a href="{{ url('/') }}" class="nav"> Home </a></li>
        <li class="divider"></li>
        <li><a href="{{ url('/product/list') }}" class="nav">Products</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Specials</a></li>
        <li class="divider"></li>
        <li><a href="{{ url('/cart/list') }}" class="nav">My Cart</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Shipping </a></li>
        <li class="divider"></li>
        <li><a href="contact.html" class="nav">Contact Us</a></li>
        <li class="divider"></li>
        <li><a href="details.html" class="nav">Details</a></li>
        @if(!Auth::check())
        <li class="divider"></li>
            <li>{{ HTML::link('/register', 'Register', array("class" => "nav")) }}</li>  
            <li>{{ HTML::link('/login', 'Login', array("class" => "nav")) }}</li>  
        @else
        <li class="divider"></li>
            <li>{{ HTML::link('/logout', 'Logout', array("class" => "nav")) }}</li>
        @endif
      </ul>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
   @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif
    <div class="left_content">
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
            <div class="product_img"><a href="{{ url('/product/view/'. $featuredproduct->id) }}"><img src="{{ $featuredproduct->images->random(1)->name }}" alt="" border="0" /></a></div>
            <div class="prod_price"><span class="reduce"> {{$featuredproduct->price }}</span> <span class="price">{{ $featuredproduct->price - ($featuredproduct->price * ($featuredproduct->discount/100)) }}</span></div>
          @else
            Not Available.
          @endif        
      </div>
      <div class="title_box">Newsletter</div>
      <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
        <a href="#" class="join">subscribe</a> </div>
      <div class="banner_adds"> <a href="#"><img src="{{ asset('ad1.jpg') }}" alt="" border="0" height="167" width="167"/></a> </div>
    </div>
    <!-- end of left content -->
    <div class="center_content">
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
    </div>
    <!-- end of center content -->
    <div class="right_content">
      <div class="title_box">Search</div>
      <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="keyword"/>
        <a href="#" class="join">search</a> </div>
      <div class="shopping_cart">
        <div class="title_box">Shopping cart</div>
        <div class="cart_details"> {{ Cart::count() }} items <br />
          <span class="border_cart"></span> Total: <span class="price">{{ Cart::total() }}</span> </div>
        <div class="cart_icon"><a href="{{ asset('cart/list')}}"><img src="{{ asset('images/shoppingcart.png') }}" alt="" width="35" height="35" border="0" /></a></div>
      </div>
      <div class="title_box">New</div>
      <div class="border_box">
          @if($newproduct != null)
            <div class="product_title"><a href="{{ url('/product/view/'. $newproduct->id) }}"> {{$newproduct->name}} </a></div>
            <div class="product_img"><a href="{{ url('/product/view/'. $newproduct->id) }}"><img src="{{ $newproduct->images->random(1)->name }}" alt="" border="0" /></a></div>
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
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
    <div class="left_footer"> <img src="{{ asset('qw.jpg') }}" alt="" width="89" height="42"/> </div>
    <div class="center_footer"> Anchor Steel Industrial Corp. <br />All Rights Reserved 2015<br />
      <a href="#"><img src="{{ asset('school.jpg') }}" alt="No. 29 North Ave. Archipelago Building, Diliman, Quezon City (across TriNoma) Phone: 926-2948 / 925-5202" title="Developed by Informatics Diliman" border="0" height="35"/></a><br />
      {{--<img src="{{ asset('images/payment.gif') }}" alt="" /> --}}
    </div>
    <div class="right_footer"> <a href="#">home</a> <a href="#">about</a> <a href="#">sitemap</a> <a href="#">rss</a> <a href="#">contact us</a> </div>
  </div>
</div>
<!-- end of main_container -->
</body>
</html>
