@include('header')

<body class=" ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="sign-in-page">
            <div id="circle-small">
            </div>
            <div id="circle-medium">
                <img src="../assets/images/wall.png" class="img-fluid" alt="logo" loading="lazy">
            </div>
            <div id="circle-large"></div>
            <div id="circle-xlarge"></div>
            <div id="circle-xxlarge"></div>

            <div class="container p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center pt-5">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="#"></a>

                        </div>
                    </div>
                    <div class="col-md-6 bg-white pt-5 pt-5 pb-lg-0 pb-5">
                        <div class="sign-in-from">
                            <img src="../assets/images/loader.png" class="img-fluid" alt="logo" loading="lazy">
                            <p>Enter your email address and password to access admin panel.</p>
                            <form class="mt-4" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="d-inline-block w-100">

                                    <button type="submit" class="btn btn-primary float-end">Sign in</button>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="{{ url('/sign-up') }}">Sign up</a></span>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="../assets/js/libs.min.js"></script>
    <script src="../assets/vendor/lodash/lodash.min.js"></script>
    <script src="../assets/js/setting/utility.js"></script>
    <script src="../assets/js/setting/setting.js"></script>
    <script src="../assets/js/setting/setting-init.js" defer></script>
    <script src="../assets/js/slider.js"></script>
    <script src="../assets/js/masonry.pkgd.min.js"></script>
    <script src="../assets/js/enchanter.js"></script>
    <script src="../assets/vendor/sweetalert2/dist/sweetalert2.min.js" async></script>
    <script src="../assets/js/sweet-alert.js" defer></script>
    <script src="../assets/js/customizer.js"></script>
    <script src="../assets/js/charts/weather-chart.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="../assets/js/fslightbox.js" defer></script>
    <script src="../assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="../assets/js/lottie.js"></script>
    <script src="../assets/js/select2.js"></script>

</body>

</html>