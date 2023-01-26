@include('header')

<body class=" ">

    <div id="loading">
        <div id="loading-center">
        </div>
    </div>


    <div class="wrapper">
        <section class="sign-in-page">
            <div id="container-inside">
                <div id="circle-small"></div>
                <div id="circle-medium"></div>
                <div id="circle-large"></div>
                <div id="circle-xlarge"></div>
                <div id="circle-xxlarge"></div>
            </div>
            <div class="container p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center pt-5">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" ><img src="../assets/images/logo.png"
                                    class="img-fluid" alt="logo" loading="lazy"></a>
                            <div class="sign-slider overflow-hidden ">
                                <ul class="swiper-wrapper list-inline m-0 p-0 ">
                                    <li class="swiper-slide">
                                        <img src="../assets/images/user/1.jpg" class="img-fluid mb-4" alt="logo">
                                        <h4 class="mb-1 text-white">Find new friends</h4>
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable content.</p>
                                    </li>
                                    <li class="swiper-slide">
                                        <img src="../assets/images/user/1.jpg" class="img-fluid mb-4" alt="logo">
                                        <h4 class="mb-1 text-white">Connect with the world</h4>
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable content.</p>
                                    </li>
                                    <li class="swiper-slide">
                                        <img src="../assets/images/user/1.jpg" class="img-fluid mb-4" alt="logo">
                                        <h4 class="mb-1 text-white">Create new events</h4>
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable content.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 bg-white pt-5 pt-5 pb-lg-0 pb-5">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Sign Up</h1>
                            <p>Enter your email address and password to access admin panel.</p>
                            <form class="mt-4" method="POST" action="{{ route('register') }}">
                            @csrf
                                <div class="form-group">
                                    
                                    <input name="name" type="text" class="form-control mb-0" id="name"
                                        placeholder="Full Name">
                                </div>
                                <!--<div class="form-group">
                                  
                                    <input type="email" class="form-control mb-0" id="lname"
                                        placeholder="Last Name">
                                </div>-->
                                <div class="form-group">
                                    
                                    <input name="email" type="text" class="form-control mb-0" id="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control mb-0" id="password"
                                        placeholder="Password">
                                </div>
                                <input name="password_confirmation" type="password" class="form-control mb-0" id="password"
                                    placeholder="Confirm Password">
                            </div>
                                <div class="d-inline-block w-100">
                                    <div class="form-check d-inline-block mt-2 pt-3" style="margin-left: 60px">
                                        <input name="terms" type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">I accept <a
                                                href="#">Terms and Conditions</a></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end " style="margin-right: 60px; margin-top:20px;">Sign Up</button>
                                </div>
                                <div class="sign-info" style="margin-left: 60px">
                                    <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a
                                            href="sign-in.html">Log In</a></span>
                              
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
    </script>


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
