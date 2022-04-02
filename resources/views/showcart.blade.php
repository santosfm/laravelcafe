<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
      <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">  -->
     <link rel="stylesheet" href="assets/css/poppinsFont.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">   -->
    <link rel="stylesheet" href="assets/css/dancingFont.css">
     <title>Cart</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/showcartStyles.css">
      <script src="{{url('js/jquery.js') }}"></script>
    </head>
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="http://127.0.0.1:8000" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy café">
                        </a>
                        <!-- ***** Logo End ***** -->

                        <!-- start responsive menu icon -->
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- end responsive menu icon -->

                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="http://127.0.0.1:8000/">Home</a></li> <!--  class="active" -->
                            <li class="scroll-to-section"><a href="http://127.0.0.1:8000/#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="http://127.0.0.1:8000/#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="http://127.0.0.1:8000/#chefs">Chefs</a></li> 
                            <!-- <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li> -->
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="http://127.0.0.1:8000/contact-us">Contact Us</a></li>
                            
                            <!-- CART SECTION -->
                            <li class="scroll-to-section">
                            <!-- if the user is logged in display the cart otherwise no -->
                            @auth 
                            <!-- get the id of the logged in user -->
                            <a href="{{url('/showcart',Auth::user()->id)}}">   
                            Cart[{{$count}}]
                            
                            @endauth
                            @guest
                            Cart[0]
                            @endguest
                            </a></li>

                            <li>
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                    <li>
                                    <x-app-layout>
  
                                    </x-app-layout>
  
                                    </li>
                                    @else
                                       <li> <a href="{{ route('login') }}" class="text-md text-gray-700 dark:text-gray-500">Log in</a></li>

                                        @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}" class="ml-4 text-md text-gray-700 dark:text-gray-500">Register</a></li>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                            </li>           
                        </ul>        
                        <a class='menu-trigger'>
                            <!-- <span style="color:#ffffff">Menu</span> -->
                            <span class="menuTextColor">Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- <div id="top"> -->


   <br><br><br><br><br><br>
    <table align="center">
        <tr>
            <th class="paddingAllAround20">Food name</th>
            <th class="paddingAllAround20">Price</th>
            <th class="paddingAllAround20">Quantity</th>
            <th rowspan="4" class="paddingAllAround20 verticalAlignTop">Action
            @foreach($data2 as $data2) 
            <a href="{{url('/remove',$data2->id)}}"><br><br><br>Remove<br>
                @endforeach
            </th>
        </tr>
    <form action="{{url('orderconfirm')}}" method="post"> 
        @csrf

        @foreach($data as $data)
        <tr align="center">
            <td class="paddingAllAround20"><input type="text" name="foodname[]" value="{{$data->title}}" hidden>{{$data->title}}</td>
            <td class="paddingAllAround20"><input type="text" name="price[]" value="{{$data->price}}" hidden>{{$data->price}}</td>
            <td class="paddingAllAround20"><input type="text" name="quantity[]" value="{{$data->quantity}}" hidden>{{$data->quantity}}</td>        
            @endforeach
        </tr>            
</table>

<br><br>
<div align="center">
    <button class="btn btn-primary" type="button" id="order">Order Now</button>
</div><br>

    <div id="appear" align="center" class="displayNone">

        <div class="paddingAllAround10">
            <label>Name:</label>
            <input type="text" name="name" placeholder="Name">
        </div>

        <div class="paddingAllAround10">
            <label>Phone:</label>
            <input type="number" name="phone" placeholder="Phone number">
        </div>

        <div class="paddingAllAround10">
            <label>Address:</label>
            <input type="text" name="address" placeholder="Address">
        </div>

        <div class="paddingAllAround10">
            <input type="submit" value="Confirm Order">
            <button id="close" type="button" class="btn btn-danger">Close</button>
        </div>
    </div>
    </form>

    <!-- jQuery -->
    <!-- <script src="assets/js/jquery-2.1.0.min.js"></script> -->
    <script src="assets/js/jquery3.6.0.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/showcart.js"></script>
  </body>
</html>