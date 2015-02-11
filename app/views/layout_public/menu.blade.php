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