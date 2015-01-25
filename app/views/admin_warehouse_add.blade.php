<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link  href="{{ asset("admin.css") }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main">
  <div id="header">
    <a href="#" class="logo"><img src="{{ asset("as.jpg") }}" width="450" height="65" alt="" /></a>
    <ul id="top-navigation">
      <li><a href="#" class="active">Homepage</a></li>
      <li><a href="#">Users</a></li>
      <li><a href="#">Orders</a></li>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Statistics</a></li>
      <li><a href="#">Design</a></li>
      <li><a href="#">Contents</a></li>
    </ul>
  </div>
  <div id="middle">
    <div id="left-column">
      <h3>Category</h3>
      <ul class="nav">
        <li><a href="{{ asset('admin/category/list') }}">List</a></li>
        <li><a href="{{ asset('admin/category/add') }}">Add</a></li>
      </ul>
      <h3>Warehouse</h3>
      <ul class="nav">
        <li><a href="{{ asset('admin/warehouse/list') }}">List</a></li>
        <li><a href="{{ asset('admin/warehouse/add') }}">Add</a></li>
      </ul>
      <h3>Manufacturer</h3>
      <ul class="nav">
        <li><a href="{{ asset('admin/manufacturer/list') }}">List</a></li>
        <li><a href="{{ asset('admin/manufacturer/add') }}">Add</a></li>
      </ul>
      <h3>Products</h3>
      <ul class="nav">
        <li><a href="{{ asset('admin/product/list') }}">List</a></li>
        <li><a href="{{ asset('admin/product/add') }}">Add</a></li>
      </ul>


      <a href="#" class="link">Link here</a>
      <a href="#" class="link">Link here</a>
    </div>
    <div id="center-column">
      <div class="table">
        {{ Form::open(array('url' => 'admin/warehouse/save', 'files' => true)) }}

        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Add New Warehouse</th>
          </tr>
          <tr>
            <td><strong>{{ Form::label('wname', 'Warehouse Name') }}</strong></td>
            <td>{{ Form::text('wname') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('address', 'Address') }}</strong></td>
            <td>{{ Form::textarea('address') }}</td>
          </tr>
          <tr>
            <td colspan="2">{{ Form::submit('Add Warehouse') }}</td>
          </tr>
        </table>

        {{ Form::close() }}
      </div>
    </div>
    <div id="right-column">
      <strong class="h">Quick Info</strong>
      <div class="box">This is your admin home page. It will give you access to all things within the back end system that you will need to facilitate a smooth operation.</div>
    </div>
  </div>
  <div id="footer"><p>Developed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010.</p></div>
</div>
</body>
</html>