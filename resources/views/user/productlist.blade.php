@extends('main')
@section('content')
    <section id="portfolio">
      <div class="row section-head">
        <div class="twelve columns">
         @foreach($product as $prods)
         	<?php $id = $prods->producttype; ?>
          @endforeach
           @foreach($category as $cat)
           	 @if($cat->categoryid == $id) 
           <h1>Our {{$cat->categoryname}}<span>.</span></h1>
           	 @endif
           @endforeach

           <hr />
        </div>
      </div>
            @if(session('success'))

            <div class="alert alert-success" style="text-align:center">
                {{ session('success') }}
            </div>

            @endif

           @if(count($product))
        
      <div class="row items">
        <div class="twelve columns">
         <div id="portfolio-wrapper" class="bgrid-fourth s-bgrid-third mob-bgrid-half group">
         	 @foreach($product as $prod)
               <div class="bgrid item">
                  <div class="item-wrap">
                     <a>
                        <img class="image{{$prod->productid}}" rel="{{$prod->productpic}}" src="{{asset('uploads/'.$prod->productpic)}}" style="margin-left: 0px">
                          <div class="overlay">
                          <div class="portfolio-item-meta">
                           <div class="price-label price{{$prod->productid}}" rel="{{$prod->productprice}}"></div><br>
                           <div class="category-label category{{$prod->productid}}" rel="{{$prod->producttype}}"></div><br>
                           <p class="name{{$prod->productid}}" rel="{{$prod->productid}}" style="font-size: 30px">{{$prod->productname}}</p><br>
                          <a href="{{ url('addcart/'.$prod->productid) }}"><button class="btn btn-primary">Order now</button></a>
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
    <h4>No Products yet.</h4>            
  	@endif
  </section><br> <!-- /Portfolio -->
  @endsection