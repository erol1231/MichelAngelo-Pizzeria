<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
  <title>MichelAngelo</title>
  <meta name="description" content="">  
  <meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="{{asset('css/base.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
   <link rel="stylesheet" href="{{asset('css/media-queries.css')}}">         

   <!-- Script
   =================================================== -->
  <script src="{{asset('js/modernizr.js')}}"></script>

   <!-- Favicons
  =================================================== -->
  
  
</head>

<body class="homepage">

   <div id="preloader"> 
     <div id="status">
         <img src="../images/loader.gif" height="60" width="60" alt="">
         <div class="loader">Loading...</div>
      </div>
   </div> 
   

   <!-- Header
   =================================================== -->
   <header id="main-header">

    <div class="row header-inner">

        <div class="logo">
           <a class="smoothscroll" href="#hero">Puremedia.</a>
        </div>

        <nav id="nav-wrap">         
           
           <a class="mobile-btn" href="#nav-wrap" title="Show navigation">
            <span class='menu-text'>Show Menu</span>
            <span class="menu-icon"></span>
           </a>
          <a class="mobile-btn" href="#" title="Hide navigation">
            <span class='menu-text'>Hide Menu</span>
            <span class="menu-icon"></span>
          </a>         
           <ul id="nav" class="nav">
              <li class="current"><a class="smoothscroll" href="dashboard">Home.</a></li>
                 <li class="dropdown"><a class="smoothscroll" href="#portfolio">Products.</a>
                  <ul class="dropdown-content">
                  @foreach($category as $c)
                    <li class="dropdown-content"><a href="">{{$c->categoryname}}</a></li>
                  @endforeach
                  </ul>
              </li>
               <li class=""><a href="{{URL::to('/login')}}"></i>Login.</a></a>
                  </ul>
              </li>
           </ul>            
        </nav> <!-- /nav-wrap -->       

     </div> <!-- /header-inner -->

   </header> 



   <!-- Hero
   =================================================== -->
   <section id="hero">  
      
    <div class="row hero-content">

      <div class="twelve columns flex-container">

         <div id="hero-slider" class="flexslider">

           <ul class="slides">

             <!-- Slide -->
             <li>
               <div class="flex-caption">
                <h1>We create amazing service with the best served pizzas</h1>  
                <p><a class="button stroke smoothscroll" href="#portfolio">Our pizzas</a></p>                                  
              </div>            
             </li>

             <!-- Slide -->
             <li>           
              <div class="flex-caption">
                <h1 >Mouth watering toppings that will make you want for more</h1>  
                <p><a class="button stroke smoothscroll" href="#portfolio">Order now!</a></p>                    
              </div>          
             </li>

             <!-- Slide -->
             <li>
               <div class="flex-caption">
                <h1 >Get ready to take your cravings to the next level</h1>
                <p><a class="button stroke smoothscroll" href="#portfolio">Choose now!</a></p>                       
              </div>
             </li>                        

           </ul>

         </div> <!-- .flexslider -->           

        </div> <!-- .flex-container -->      

    </div> <!-- .hero-content -->    

   </section> <!-- #hero -->


   <!-- Portfolio
   ================================================== -->
   <section id="portfolio">
      <div class="row section-head">
        <div class="twelve columns">
           <h1>Categories<span>.</span></h1>
           @if(count($category))
           <hr />
        </div>
      </div>
      <div class="row items" style="margin-left: 225px">
        <div class="twelve columns"> 
         <div id="portfolio-wrapper" class="">
          @foreach($category as $c2)
               <div class="bgrid item">
                  <div class="item-wrap">
                     <a href="portfolio.html">
                        <img src="{{asset('uploads/'.$c2->categorypic)}}" style="margin-left: 0px">
                          <div class="overlay">
                          <div class="portfolio-item-meta">
                          <h2>{{$c2->categoryname}}</h2>
                          <button style="width:200px;height:100px;margin-left: 100px"><a style="color:white" href="">View</a></button>
                          </div>
                        </div>                                                
                     </a>                
                  </div>
              </div>
            @endforeach
            </div>
         </div> 
      </div><br><br>
    @else
    <h4>No Pictures have been uploaded!. Click this button to <a href="">upload</a></h4>
    @endif            
  </section><br> <!-- /Portfolio -->

   <!-- Footer
   ================================================== -->
  <section id="footer">
   <footer>

      <div class="row">       

         <div class="six columns tab-whole footer-about">
        
        <h3>About Pizzeria MichelAngelo</h3>
               
            <p>Pizzeria MichelAngelo has been around for 2 decades. It has been our goal to provide our customers with the most authentic New York Style Pizza.
            </p>

            <p>We use 100% Whole Milk Cheese and always use fresh toppings</p>        

         </div> <!-- /footer-about -->

         <div class="six columns tab-whole right-cols">

            <div class="row">

               <div class="columns">
                  <h3 class="address">Contact Us</h3>
                  <p>
                  1 Paseo John <br>
                  Banilad, Cebu City<br>
                  6000 Cebu
                  </p>

                  <ul>
                    <li><a href="tel:6473438234">647.343.8234</a></li>
                    <li><a href="tel:1234567890">123.456.7890</a></li>
                    <li><a href="mailto:someone@puremedia.com">erolbranzuela@ymail.com</a></li>
                  </ul>                  
               </div> <!-- /columns -->             

               <div class="columns last">
                  <h3 class="contact">Follow Us</h3>

                  <ul>
                     <li><a href="#">Facebook</a></li>
                     <li><a href="#">Twitter</a></li>
                     <li><a href="#">GooglePlus</a></li>
                     <li><a href="#">Instagram</a></li>
                     <li><a href="#">Flickr</a></li>
                     <li><a href="#">Skype</a></li>
                  </ul>
                  
               </div> <!-- /columns --> 

            </div> <!-- /Row(nested) -->

         </div>       

         <div id="go-top">
            <a class="smoothscroll" title="Back to Top" href="#hero"><span>Top</span><i class="fa fa-long-arrow-up"></i></a>
         </div>

      </div> <!-- /row -->

   </footer> <!-- /footer -->
 </section>




   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="{{asset('js/jquery-1.10.2.min.js')}}"/>')</script>
   <script type="text/javascript" src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>   
   <script src="{{asset('js/jquery.flexslider.js')}}"></script>
   <script src="{{asset('js/jquery.fittext.js')}}"></script>
   <script src="{{asset('js/backstretch.js')}}"></script> 
   <script src="{{asset('js/waypoints.js')}}"></script>  
   <script src="{{asset('js/main.js')}}"></script>

</body>

</html>