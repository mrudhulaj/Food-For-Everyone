<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Food For Everyone</title>
    <link rel="icon" href="{{ url('images/mainLogo.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/feedkeralahome.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/responsive.css') }}">
    <link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/datatables.net-dt/css/jquery.dataTables.min.css') }}">
</head>

<style>
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        background-color: white;
        opacity: 1;
        z-index: 1000;
        box-shadow: 0px 5px 20px 10px rgba(0, 0, 0, 0.5);
        height: 100px;
        margin-top: -20px;
    }

    .sticky+.content {
        padding-top: 60px;
    }

</style>
@php
    $activeTab = Session::get('activeTab');
@endphp

<body>
    <div class="wrapper">
        <header class="header">
            <section class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="contact">
                                <p><span class="phone join-us"><a href="#">Phone: +91 9998881111</a></span><span
                                        class="email join-us"><a href="#">Email: info@foodforeveryone.com</a></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="join-us">
                                <p>
                                  <a href="{{ route('login') }}">
                                      @if($activeTab == 'LOGIN')
                                          <a href="{{ route('home') }}">Home</a>
                                      @else
                                          Sign Up / Login
                                      @endif
                                  </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @if($activeTab != 'LOGIN')
                <section class="header-bottom"> {{-- id="navbar" for sticky navbar --}}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('home') }}">
                                    <div class="main-logo">
                                        <img src="{{ url('images/mainLogo.png') }}" width="50"
                                            height="50">
                                        <h2>Food For Everyone</h2>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <div class="menu">
                                    <ul class="nav navbar-nav">
                                        <li class=" @if($activeTab == 'HOME') active-nav @endif ">
                                            <a href="{{ route('home') }}">HOME</a>
                                        </li>
                                        <li class=" @if($activeTab == 'ABOUT US') active-nav @endif">
                                            <a href="{{ route('aboutUs') }}">ABOUT US</a>
                                        </li>
                                        <li class=" @if($activeTab == 'AVAILABLE FOODS') active-nav @endif ">
                                            <a href="{{ route('availableFoodsView') }}">AVAILABLE
                                                FOODS</a>
                                        </li>
                                        <li class=" @if($activeTab == 'CAUSES') active-nav @endif ">
                                            <a href="{{ route('causesView') }}">CAUSES</a>
                                        </li>
                                        <li class=" @if($activeTab == 'VOLUNTEERS') active-nav @endif ">
                                            <a href="{{ route('volunteersView') }}">VOLUNTEERS </a>
                                        </li>
                                        <li class=" @if($activeTab == 'EVENTS') active-nav @endif ">
                                            <a href="{{ route('events') }}">EVENTS</a>
                                        </li>
                                        <li class=" @if($activeTab == 'CONTACT') active-nav @endif ">
                                            <a href="{{ route('contactUs') }}">CONTACT</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        </header>
        {{-- Main Content Begins --}}
        @yield('content')
        {{-- Main Content Ends --}}

        <footer class="footer" @if($activeTab == 'LOGIN') style="display: none;" @endif>
            <div class="container">
              {{--  <footer class="footer" >  --}}
                {{--  <div class="container" >  --}}
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="footer-charity-text">
                            <h2>Food For Everyone</h2>
                            <p>We are a non-profit organization helping restaurents and event planners to distribute
                                their leftover food to the needy people.</p>
                            <hr>
                            <p><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-behance" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-dribbble" aria-hidden="true"></i></a></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <div class="footer-text one">
                                    <h3>RECENT POST</h3>
                                    <ul>
                                        <li><a href="#"><i class="material-icons">keyboard_arrow_right</i>Volunteers
                                                awarded</a></li>
                                        <li><a href="#"><i class="material-icons">keyboard_arrow_right</i>Support from
                                                Kerala Government</a></li>
                                        <li><a href="#"><i class="material-icons">keyboard_arrow_right</i>New
                                                restaurents added</a></li>
                                        <li><a href="#"><i class="material-icons">keyboard_arrow_right</i>Guide for
                                                event planners</a></li>
                                        <li><a href="#"><i class="material-icons">keyboard_arrow_right</i>How to
                                                minimise food wastage</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <div class="footer-text two">
                                    <h3>USEFUL LINKS</h3>
                                    <ul>
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="{{route('aboutUs')}}">About Us</a></li>
                                        <li><a href="{{route('availableFoodsView')}}">Available Foods</a></li>
                                        <li><a href="{{route('causesView')}}">Causes</a></li>
                                        <li><a href="{{route('volunteersView')}}">Volunteers</a></li>
                                        <li><a href="{{route('events')}}">Events</a></li>
                                        <li><a href="{{route('contactUs')}}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="footer-text one">
                                    <h3>CONTACT US</h3>
                                    <ul>
                                        <li><a href="#"><i class="material-icons">location_on</i>Emerald Building ,
                                                Calicut , Kerala , India - 673005</a></li>
                                        <li><a href="#"><i class="material-icons">email</i>foodforeveryone@gmail.com</a>
                                        </li>
                                        <li><a href="#"><i class="material-icons">call</i>+91 9998881111</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <p>
                    Registered as FoodForEveryone &copy
                </p>
                <p style="margin: 0;margin-top: -40px;">
                    All donations are tax-exempted as eligible under section 80G of the Income Tax
                    Act, 1961.
                </p>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('js/animationCounter.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/dist/jquery.validate.min.js') }}" defer>
    </script>
    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

        // Begin:To automatically fade and close alert messages
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
        // End:To automatically fade and close alert messages


        //Begin:Make navbar sticky

        // window.onscroll = function() {myFunction()};

        // var navbar = document.getElementById("navbar");
        // var sticky = navbar.offsetTop;

        // function myFunction() {
        // 	if (window.pageYOffset >= sticky) {
        // 		navbar.classList.add("sticky")
        // 	} else {
        // 		navbar.classList.remove("sticky");
        // 	}
        // }

        // End: Make Navbar sticky

    </script>
</body>

</html>
