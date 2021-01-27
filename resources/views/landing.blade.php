<!DOCTYPE HTML>
<html>

<head>
    <title>Hostel Management System</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="custom/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="custom/css/noscript.css" /></noscript>
</head>

<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper" class="divided">
    <!-- One -->
    <section
        class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
        <div class="content">
            <h1>Hostel Management System</h1>
            <p class="major">This is Web based system that offers simple Hostel Management Powered by Laravel
                Framework.</p>
            <ul class="actions stacked">
                <li>
                    @if (Route::has('login'))
                        @auth
                                <a href="{{ url('/home') }}" class="button big wide smooth-scroll-middle">Home</a>
                    @else
                                <a href="{{ route('login') }}" class="button big wide smooth-scroll-middle">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="button big wide smooth-scroll-middle">Register</a>
                            @endif
                        @endauth
                    @endif
                    {{--<a href="#first" class="button big wide smooth-scroll-middle">Login</a>
                    <a href="#first" class="button big wide smooth-scroll-middle">Register</a>--}}
                </li>
            </ul>
        </div>
        <div class="image">
            <img src="custom/img/banner.jpg" alt="" />
        </div>
    </section>
    <!-- Footer -->
    <footer class="wrapper style1 align-center">
        <div class="inner">
            {{--<ul class="icons">
                <li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a>
                </li>
                <li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a>
                </li>
                <li><a href="#" class="icon brands style2 fa-linkedin-in"><span class="label">LinkedIn</span></a>
                </li>
                <li><a href="#" class="icon style2 fa-envelope"><span class="label">Email</span></a></li>
            </ul>--}}
            <p>&copy; Group 7 2021.</p>
        </div>
    </footer>

</div>

<!-- Scripts -->
<script src="custom/js/jquery.min.js"></script>
<script src="custom/js/jquery.scrollex.min.js"></script>
<script src="custom/js/jquery.scrolly.min.js"></script>
<script src="custom/js/browser.min.js"></script>
<script src="custom/js/breakpoints.min.js"></script>
<script src="custom/js/util.js"></script>
<script src="custom/js/main.js"></script>

</body>

</html>
