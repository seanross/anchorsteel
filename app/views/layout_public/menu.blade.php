<ul class="menu">
    <li><a href="{{ url('/') }}" class="nav"> Home </a></li>
    <li class="divider"></li>
    <li><a href="{{ url('/product/list') }}" class="nav">Products</a></li>
    <li class="divider"></li>
    <li><a href="#" class="nav">Shipping </a></li>
    <li class="divider"></li>
    <li><a href="{{ url('/contact_us') }}" class="nav">Contact Us</a></li>
    <li class="divider"></li>
    <li><a href="details.html" class="nav">Details</a></li>
    @if(!Auth::check())
        <li class="divider"></li>
        <li>{{ HTML::link('/register', 'Register', array("class" => "nav")) }}</li>  
        <li class="divider"></li>
        <li>{{ HTML::link('/login', 'Login', array("class" => "nav")) }}</li>  
    @else
    
        @if(Auth::user()->hasRole('Buyer'))
        <li class="divider"></li>
        <li><a href="{{ url('/cart/list') }}" class="nav">My Cart</a></li>
        <li class="divider"></li>
        <li><a href="{{ url('/my/transactions/list') }}" class="nav">My Transactions</a></li>
        @endif
        
        @if(Auth::user()->hasRole('Admin'))
        <li class="divider"></li>
        <li>{{ HTML::link('/admin/home', 'Admin Panel', array("class" => "nav")) }}</li>
        @endif
        <li class="divider"></li>
        <li>{{ HTML::link('/logout', 'Logout', array("class" => "nav")) }}</li>
    @endif
</ul>