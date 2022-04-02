<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- <base href="/public"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="assets/css/poppinsFont.css">
     <link rel="stylesheet" href="assets/css/dancingFont.css">

    <title>Register to place an order</title>
<!-- TemplateMo 558 Klassy Cafe https://templatemo.com/tm-558-klassy-cafe -->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/registerStyles.css">
    </head>
    <body>
    
    <!-- ***** Preloader Start ***** HAD TO REMOVE THE PRELOADER BECAUSE IT WAS CAUSING PROBLEMS -->
     <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>    -->
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="http://127.0.0.1:8000" class="logo">
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
                            <li class="scroll-to-section"><a href="http://127.0.0.1:8000/">Home</a></li>   <!-- class="active" -->
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
                              <!-- <li class="scroll-to-section" style="padding-top:8px;font-weight:500"> -->
                              <li class="scroll-to-section" id="paddingTop8" id="fontWeight500"> 
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
                                       <li> <a href="{{ route('login') }}" class="text-md text-gray-700 dark:text-gray-500">Log in</a></li> 

                                        @if (Route::has('register'))
                                        <!-- <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li> -->
                                        @endif
                                    @endauth
                                </div>
                            @endif
                            </li>
                                         
                        </ul>        
                        <a class='menu-trigger'>
                            <!-- <span style="color:#ffffff">Menu</span> -->
                            <span class="colorWhite">Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
<br>
    
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        
        <x-jet-validation-errors class="mb-4" />
<strong><h1>Register to place an order.</h1><br><br></strong>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
<script src="assets/js/jquery3.6.0.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
 <!-- Plugins -->
 <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    <script src="assets/js/custom.js"></script> <!-- Global Init -->
</body>
</html>