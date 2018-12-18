<!-- Hero
   =================================================== -->
   @extends('main')
   @section('content')
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
      <div class="row section-head" style="text-align: center">
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
                          <button style="width:200px;height:100px;margin-left: 100px"><a style="color:white" href="{{ route('productlist', $c2->categoryid) }}">View</a></button>
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
  @endsection
