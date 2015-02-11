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
    @include('layout_admin.header')
  </div>
  <div id="middle">
      
    @include('layout_admin.leftbar')
    
    <div id="center-column">
      @yield('content', 'Empty content')
    </div>
    <div id="right-column">
        @include('layout_admin.rightbar')
    </div>
  </div>
   <div id="footer">
        @include('layout_admin.footer')
   </div>
</div>
</body>
</html>