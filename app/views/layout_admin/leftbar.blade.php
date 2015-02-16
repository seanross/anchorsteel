<div id="left-column">
     <h3>Customer Orders</h3>
      <ul class="nav">
        <li><a href="{{ asset('admin/transaction/list/pending') }}">New/Pending</a></li>
        <li><a href="{{ asset('admin/transaction/list/received') }}">Received</a></li>
        <li><a href="{{ asset('admin/transaction/list/completed') }}">Completed</a></li>
        <li><a href="{{ asset('admin/transaction/list/shipping') }}">Shipping</a></li>
        <li><a href="{{ asset('admin/transaction/list/all/cancelled') }}">Cancelled</a></li>
      </ul>
      <h3>ADD NEW DATA</h3>
      <ul class="nav">
        <li><a href="{{ asset('admin/product/add') }}">Products</a></li>
        <li><a href="{{ asset('admin/category/add') }}">Categories</a></li>
        <li><a href="{{ asset('admin/warehouse/add') }}">Warehouses</a></li>
        <li><a href="{{ asset('admin/manufacturer/add') }}">Manufacturers</a></li>
      </ul>

      <a href="#" class="link">Link here</a>
      <a href="#" class="link">Link here</a>
</div>