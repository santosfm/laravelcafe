<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <script src="{{url('js/jquery.js') }}"></script>
<title>Contact Us</title>
    <meta name="description" content="">
    <meta name="author" content="">
     <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">  -->
    <link href="assets/css/poppinsFont.css" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="assets/css/dancingFont.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">
    <!-- <link rel="stylesheet" href="assets/css/owl-carousel.css"> -->
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/contactUsStyles.css">
    
</head>
<body>
<br><br><br><br><br><br>
    <!-- ***** Header Area Start ***** -->
     <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe">
                        </a>
                        <!-- ***** Logo End ***** -->

                        <!-- start responsive menu icon -->
                        <a class="menu-trigger">
                            <!-- <span>Menu</span> -->
                            <span class="colorWhite">Menu</span>
                        </a>
                        <!-- end responsive menu icon -->
                        
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="http://127.0.0.1:8000/">Home</a></li>
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
                            <li class="scroll-to-section"><a href="http://127.0.0.1:8000/#reservation">Reservations</a></li>
                            <!-- <li class="scroll-to-section"><a href="#contactUs">Contact Us</a></li> -->
                               
                              <!-- CART SECTION -->
                              <!-- <li class="scroll-to-section" style="padding-top:8px;font-weight:500"> -->
                              <li class="scroll-to-section" id="paddingTop8" id="fontWeight500"> 
                            <!-- if the user is logged in display the cart otherwise no -->
                            {{-- @auth --}} 
                            <!-- get the id of the logged in user -->
                            {{-- <a href="{{url('/showcart',Auth::user()->id)}}">   --}} 
                            {{-- Cart[{{$count}}] --}} 
                            {{-- @endauth --}} 

                            @guest
                            Cart[0]
                            @endguest
                            </a>
                            </li>
                            <!-- END CART SECTION -->  

                            <li>
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                    <li>
                                    <x-app-layout>
  
                                    </x-app-layout>
                                    </li>
                                    @else
                                       <li> <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                                        @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                            </li>               
                                         
                        </ul>        
                        <a class='menu-trigger'>
                            <span style="color:#FB6356">Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
        </header>
    <!-- ***** Header Area End ***** -->
<div id="marginLeft">
<section>
<h2>Contact Us</h2><br>
 <!-- USED TO IF MESSAGE IS SENT SUCCESSFULLY THROUGH CONTACT FORM -->
   @if(Session::has('message_sent'))
    <div class="emailSentMessage">
    {{Session::get('message_sent')}}
    </div>
    @endif
   <!-- END USED TO IF MESSAGE IS SENT SUCCESSFULLY THROUGH CONTACT FORM -->
<div>

<form method="post" action="{{route('contact.send')}}" enctype="multipart/form-data">
@csrf

<table border="0">
    <tr><td>
<label for="name">Name</label>
</td><td>
<input type="text" name="name" placeholder="Your name.." value=" {{old ('name') }} "><span class="errorMessage">@error('name'){{$message}}@enderror</span><br />
</td></tr>
<tr><td>
<label for="email">Email</label>
</td><td>
<input type="email" name="email" placeholder="myemail@yahoo.com" value=" {{old ('email') }} "><span class="errorMessage">@error('email'){{$message}}@enderror</span><br />
</td></tr>
<tr><td>
<label for="msg" class="messageLabel">Message</label>
</td><td>
<textarea name="msg" class="comments" rows="4" cols="50" placeholder="Your questions or comments here..">{{ old ('msg') }}</textarea><span class="errorMessage">@error('msg'){{$message}}@enderror</span><br>
</td></tr>
</table>
<br />
<!-- captcha -->
<div class="captcha">
Please copy these 4 letters into the textbox below(<i>#</i>)
<span>{!! captcha_img() !!}</span> 
 <button type="button" class="reload" id="reload" title="click to get another image" alt="click to get another image">↻</button> 
 </div> 
 <span class="errorMessage">@error('captcha'){{$message}}@enderror</span><br>
 <br />
<input id="captcha" type="text" size="5" maxlength="5" class="form-control" placeholder="Captcha" name="captcha">
<br /><br />
<input type="submit" class="submit" value="Submit"> <input class="reset" type="reset" value="Reset">
</form>
</div>
<br />

<i>(#) Captcha is used to check to make sure a human is filling in the form and not a spam bot.</i>
</section>
</div>
<script src="assets/js/jquery3.6.0.js"></script>
<!-- Bootstrap -->
<!-- <script src="assets/js/popper.js"></script> -->
<script src="assets/js/bootstrap.min.js"></script>
 <!-- Plugins -->
 <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <!-- <script src="assets/js/datepicker.js"></script> -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    <script src="assets/js/custom.js"></script> <!-- Global Init -->
    <script src="assets/js/myScripts.js"></script>

</body></html>
