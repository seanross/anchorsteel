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

@section('styles')

@show
</head>
<body>
<div id="main_container">
  <div id="header">
      
    @include('layout_public.header')
    
  </div>
  <div id="main_content">
      
    <div id="menu_tab">
      
        @include('layout_public.menu')
        
    </div>
<!--        <div class="crumb_navigation">
            <a href="#" class="lang"><img src="{{ asset('adminpanel.jpg') }}" width="50" height="50" alt="" border="0" /></a> 
            <a href="#" class="lang"><img src="{{ asset('logout.jpg') }}" width="37" height="50" alt="" border="0" /></a> 
       </div>-->
      

   @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif
    <div class="left_content">

        @include('layout_public.leftbar')
            
    </div>
    <!-- end of left content -->
    <div class="center_content">
        
        @yield('content', 'Empty content')
        
    </div>
    <!-- end of center content -->
    <div class="right_content">
    
        @include('layout_public.rightbar')
        
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
      
     @include('layout_public.footer') 
      
  </div>
</div>
<!-- end of main_container -->
</body>
</html>
