<!DOCTYPE html>
<html>
<head>
<title>FormSubmit</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<style>
.errorMessage {
  color: red;
}

.emailSentMessage {
  color: black;
  background-color: #0ceedd; /* lightblue */
  padding: 20px;
  border-radius: 4px;
  font-weight: bold;
  font-size: 16pt;
}
</style>
</head>
<body>
<br><br><br><br><br><br><br>
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
                            <span>Menu</span>
                        </a>
                        <!-- end responsive menu icon -->
                        
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
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
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
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
                            <li class="scroll-to-section"><a href="#reservation">Reservations</a></li>
                            <li class="scroll-to-section"><a href="#contactUs">Contact Us</a></li>
                                 <!-- CART SECTION -->
                              <li class="scroll-to-section" style="padding-top:8px;font-weight:500">
                            <!-- if the user is logged in display the cart otherwise no -->
                            @auth 
                            <!-- get the id of the logged in user -->
                            <a href="{{url('/showcart',Auth::user()->id)}}">   
                            Cart[{{$count}}]
                            @endauth
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

@php


       
@endphp

<form action="{{url('https://formsubmit.co/d3cdb965c8224405fcfe83a2cb59d885')}}" method="post">
@csrf

@php

if(isset($_POST['submitBtn']){
$name = $_POST['name'];

if(isset($name)){
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        } else {
            $name = null;
        }

    if($_POST['name'] == "") {
        echo "name empty";
    }

}
//display error messages here
		foreach($errors as $error) {
 		  echo $error;
		}
@endphp
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Your name.." value=" {{old ('name') }} " required>
    <span class="errorMessage">@error('name'){{$message}}@enderror</span><br />

<label for="email">Email</label>
<input type="email" name="email" placeholder="myemail@yahoo.com" value=" {{old ('email') }} " required>
<span class="errorMessage">@error('email'){{$message}}@enderror</span><br />

<label for="msg" class="messageLabel">Message</label>
<textarea name="msg" class="comments" rows="4" cols="50" placeholder="Your questions or comments here.." required></textarea>
<span class="errorMessage">@error('msg'){{$message}}@enderror</span><br />
<br />
<input type="hidden" name="_next" value="http://127.0.0.1:8000/">
<input type="hidden" name="_subject" value="Someone has contacted you.">
     <input type="text" name="_honey" style="display:none">
     <input type="hidden" name="_captcha" value="true">
     <input type="hidden" name="_template" value="table">
     <!-- <input type="hidden" name="_autoresponse" value="Thank you for contacting Klassy Café. We aim to get back to you as soon as possible. Have a nice day."> -->
     <button type="submit" name="submitBtn">Send</button> <input type="reset" value="Clear">
    
</form>

</body>
</html>