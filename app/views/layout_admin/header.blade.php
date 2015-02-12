<a href="#" class="logo"><img src="{{ asset("as.jpg") }}" width="450" height="65" alt="" /></a>
<ul id="top-navigation">
  <li><a href="{{ url('/admin/home')}}" class="{{ Request::is("admin/home") ? 'active' : '' }}">Homepage</a></li>
  <li><a href="{{ url('/admin/transaction/list') }}" class="{{ Request::is("admin/transaction/*") ? 'active' : '' }}">Transaction/Orders</a></li>
  <li><a href="{{ url('/admin/product/list') }}" class="{{ Request::is("admin/product/*") ? 'active' : '' }}">Products</a></li>
  <li><a href="{{ url('/admin/category/list') }}" class="{{ Request::is("admin/category/*") ? 'active' : '' }}">Category</a></li>
  <li><a href="{{ url('/admin/warehouse/list') }}" class="{{ Request::is("admin/warehouse/*") ? 'active' : '' }}">Warehouse</a></li>
  <li><a href="{{ url('/admin/manufacturer/list') }}" class="{{ Request::is("admin/manufacturer/*") ? 'active' : '' }}">Manufacturer</a></li>
  <li><a href="{{ url('/admin/user/list') }}" class="{{ Request::is("admin/user/*") ? 'active' : '' }}">Users</a></li>
  <li><a href="{{ url('/') }}" >Preview Public Site</a></li>
</ul>