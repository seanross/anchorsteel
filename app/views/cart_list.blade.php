<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tools Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="{{ asset('style.css') }} " />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="{{ asset('iecss.css') }}" />
<![endif]-->
<script type="text/javascript" src="{{ asset('js/boxOver.js') }}" ></script>

<style>
        .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

mainbody {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
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
        <li><a href="#" class="nav"> Home </a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Products</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Specials</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">My account</a></li>
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
            <div class="product_title"><a href="#"> {{ $featuredproduct->name }} </a></div>
            <div class="product_img"><a href="#"><img src="{{ $featuredproduct->images->random(1)->name }}" alt="" border="0" /></a></div>
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
    <div class="center_content mainbody">
      
        
        <header class="clearfix">
<!--      <div id="logo">
        <img src="{{ asset('qw.jpg') }}">
      </div>-->
      <h1><img src="{{ asset('images/shoppingcart.png') }}"> CART ITEMS <img src="{{ asset('images/shoppingcart.png') }}"></h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
<!--        <div><span>PROJECT</span> Website development</div>-->
        <div><span>CLIENT</span> {{ Auth::user()->firstname ." ". Auth::user()->lastname }}</div>
        <div><span>CLIENT</span> {{ Auth::user()->contactno }}</div>
        <div><span>ADDRESS</span> {{ Auth::user()->address }}</div>
        <div><span>EMAIL</span> <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></div>
        <div><span>DATE</span>{{ Auth::user()->created_at }}</div>
<!--        <div><span>DUE DATE</span> September 17, 2015</div>-->
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Description</th>
            <th class="desc">Options</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
          </tr>
        </thead>
        <tbody>
             @foreach ($products as $p)
          <tr>
            <td class="service">{{ $p->name }}</td>
            <td class="desc">
                <a href="{{ url('cart/add', $p->id) }}">
                      <img src="{{ asset('images/add-icon.gif') }}" width="16" height="16" alt="" />
                  </a>
                  <a href="{{ url('cart/edit', $p->id.  '/' .  $p->rowid) }}">
                      <img src="{{ asset('images/edit-icon.gif') }}" width="16" height="16" alt="" />
                  </a>
                  <a href="{{ url('cart/delete', $p->rowid) }}">
                      <img src="{{ asset('images/hr.gif') }}" width="16" height="16" alt="" />
                  </a>
            </td>
            <td class="unit">{{ $p->price }}</td>
            <td class="qty">{{ $p->qty }}</td>
            <td class="total">{{ $p->price * $p->qty }}</td>
          </tr>
            @endforeach
          <tr>
            <td colspan="4"></td>
            <td class="total"></td>
          </tr>
          <tr>
            <td colspan="4">TOTAL QUANTITY</td>
            <td class="total">{{Cart::count()}}</td>
          </tr>
           <tr>
            <td colspan="4" class="grand total">TOTAL PRICE</td>
            <td class="grand total">{{Cart::total()}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
        
        
    </div>
    <!-- end of center content -->
    <div class="right_content">
      <div class="title_box">Search</div>
      <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="keyword"/>
        <a href="#" class="join">search</a> </div>
      <div class="shopping_cart">
        <div class="title_box">Shopping cart</div>
        <div class="cart_details"> {{ $cart_quantity }} items <br />
          <span class="border_cart"></span> Total: <span class="price">{{ $cart_total }}</span> </div>
        <div class="cart_icon"><a href="{{ asset('cart/list')}}"><img src="{{ asset('images/shoppingcart.png') }}" alt="" width="35" height="35" border="0" /></a></div>
      </div>
      <div class="title_box">New</div>
      <div class="border_box">
          @if($newproduct != null)
            <div class="product_title"><a href="#"> {{$newproduct->name}} </a></div>
            <div class="product_img"><a href="#"><img src="{{ $newproduct->images->random(1)->name }}" alt="" border="0" /></a></div>
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
