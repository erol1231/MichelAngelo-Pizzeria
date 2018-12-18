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
            @if(Auth::user()->level == 3)
              <li class=""><a class="" href="{{ route('home') }}">Home.</a></li>
                 <li class="dropdown"><a class="smoothscroll" href="#portfolio">Products.</a>
                  <ul class="dropdown-content">
                  @foreach($category as $c)
                    <li class="dropdown-content"><a href="{{ route('productlist', $c->categoryid) }}">{{$c->categoryname}}</a></li>
                  @endforeach
                  </ul>
              </li>
              <li><a class="" href="{{ URL::to('myorder') }}"><span>
                  My Orders.  <span class="cartcount" ><span class="cartcount"></span></span>  
              </span></a>
              </li>
              <li class="dropdown" style="color:white">Welcome {{Auth::user()->fname}}<a href="#"></i></a></a>
                  <ul class="dropdown-content">
                    <li class="dropdown-content"><a href="{{URL::to('/logmeout')}}">Log out.   </a></li>
                    <li class="dropdown-content"><a href="{{URL::to('/editme')}}">Edit account.   </a></li>
                    <li class="dropdown-content"><a href="{{URL::to('/changepass')}}">ChangePassword.   </a></li>
                   </ul>
              </li>
                  @elseif(Auth::user()->level == 1)
                     <li class=""><a class="" href="{{ route('home') }}">Home.</a></li>
                      <li class="dropdown"><a class="" href="{{URL::to('/showcateg')}}">Products.</a>
                        <ul class="dropdown-content">
                           @foreach($category as $c)
                            <li class="dropdown-content"><a href="{{URL::to('/showsomeprod/'.$c->categoryid)}}">{{$c->categoryname}}</a></li>
                           @endforeach
                        </ul>
                    <li class="dropdown"><a class="" href="{{URL::to('/show_order')}}">Orders.</a>
                        <ul class="dropdown-content">
                        <?php $pend = "pending";
                              $app = "completed"; ?>
                          <li class="dropdown-content"><a href="{{URL::to('/status/'.$pend)}}">Pendings</a></li>
                          <li class="dropdown-content"><a href="{{URL::to('/status/'.$app)}}">Approved</a></li>
                        </ul>
                    </li>
                   <li><a class="" href="{{URL::to('/showlogs')}}">Logs.</a></li>
                   <?php $cust = "3";
                          $super = "1";
                          $adm = "2"; ?>
                    <li class="dropdown"><a href="{{URL::to('/getallusers')}}">Users.</a>
                      <ul class="dropdown-content">
                        <li class="dropdown-content"><a href="{{URL::to('/allcustomers/'.$cust)}}">Customers</a></li>
                        <li class="dropdown-content"><a href="{{URL::to('/allcustomers/'.$adm)}}">Admins</a></li>
                      </ul>
                    </li>
                    <li class="dropdown" style="color:white">Welcome {{Auth::user()->fname}}<a href="#"></i></a></a>
                      <ul class="dropdown-content">
                       <li class="dropdown-content"><a href="{{URL::to('/logmeout')}}">Log out.   </a></li>
                       <li class="dropdown-content"><a href="{{URL::to('/changepass')}}">ChangePassword.</a></li>
                     </ul>
                   </li>
                   @else
                    <li class=""><a class="" href="{{ route('home') }}">Home.</a></li>
                       <li class="dropdown"><a class="" href="{{URL::to('/showcateg')}}">Products.</a>
                        <ul class="dropdown-content">
                           @foreach($category as $c)
                            <li class="dropdown-content"><a href="{{URL::to('/showsomeprod/'.$c->categoryid)}}">{{$c->categoryname}}</a></li>
                           @endforeach
                        </ul>
                      </li>
                    <li class="dropdown"><a class="" href="{{URL::to('/show_order')}}">Orders.</a>
                        <ul class="dropdown-content">
                        <?php $pend = "pending";
                              $app = "completed"; ?>
                          <li class="dropdown-content"><a href="{{URL::to('/status/'.$pend)}}">Pendings</a></li>
                          <li class="dropdown-content"><a href="{{URL::to('/status/'.$app)}}">Approved</a></li>
                        </ul>
                    </li>
                    <?php $cust = "3";
                          $super = "1";
                          $adm = "2"; ?>
                    <li><a class="" href="{{URL::to('/allcustomers/'.$cust)}}">Customers.</a></li>
                    <li class="dropdown" style="color:white">Welcome {{Auth::user()->fname}}<a href="#"></i></a></a>
                      <ul class="dropdown-content">
                       <li class="dropdown-content"><a href="{{URL::to('/logmeout')}}">Log out.   </a></li>
                       <li class="dropdown-content"><a href="{{URL::to('/changepass')}}">ChangePassword.</a></li>
                     </ul>
                   </li>
                   @endif
           </ul>            
        </nav> <!-- /nav-wrap -->       
     </div> <!-- /header-inner -->

   </header> 