<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
      @include('parts.head') 
</head>

<body class="homepage">

   <div id="preloader"> 
	   <div id="status">
         <img src="../images/loader.gif" height="60" width="60" alt="">
         <div class="loader">Loading...</div>
      </div>
   </div>
   

   @include('parts.nav')
   @yield('content')
   
   <!-- Footer
   ================================================== -->
  <section id="footer">
   @include('parts.footer')
 </section>

</div>
   <!-- Java Script
   ================================================== -->
  @include('parts.scripts')

</body>

</html>