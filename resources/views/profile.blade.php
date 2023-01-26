@include('header')

@include('left_sidebar')

@include('navbar')

@include('right_sidebar')

<div class="position-relative">
</div>
<div id="content-page" class="content-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body profile-page p-0">
                        <div class="profile-header">
                            <div class="position-relative">
                                <img width="651x" height="300px" src="../assets/images/page-img/it.png">
                                <br><br><br>
                            </div>
                            <div class="user-detail text-center mb-3">
                                <div class="profile-img">
                                    <img src="{{Auth::user()->profile_photo_url}}" alt="profile-img" loading="lazy" class="avatar-130 img-fluid" />
                                </div>
                                <div class="profile-detail">
                                    <h3 class="">{{Auth::user()->full_name}}</h3>
                                </div>
                            </div>
                            <div class="profile-info p-3 d-flex align-items-center justify-content-between position-relative">
                                <!--<div class="social-links">
                                    <ul
                                        class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                        <li class="text-center pe-3">
                                            <a href="#"><img src="../assets/images/icon/05.png"
                                                    class="img-fluid rounded" alt="facebook" loading="lazy"></a>
                                        </li>
                                        <li class="text-center pe-3">
                                            <a href="#"><img src="../assets/images/icon/05.png"
                                                    class="img-fluid rounded" alt="Twitter" loading="lazy"></a>
                                        </li>
                                        <li class="text-center pe-3">
                                            <a href="#"><img src="../assets/images/icon/05.png"
                                                    class="img-fluid rounded" alt="Instagram" loading="lazy"></a>
                                        </li>
                                        <li class="text-center pe-3">
                                            <a href="#"><img src="../assets/images/icon/11.png"
                                                    class="img-fluid rounded" alt="Google plus" loading="lazy"></a>
                                        </li>
                                        <li class="text-center pe-3">
                                            <a href="#"><img src="../assets/images/icon/12.png"
                                                    class="img-fluid rounded" alt="You tube" loading="lazy"></a>
                                        </li>
                                        <li class="text-center md-pe-3 pe-0">
                                            <a href="#"><img src="../assets/images/icon/12.png"
                                                    class="img-fluid rounded" alt="linkedin" loading="lazy"></a>
                                        </li>
                                    </ul>
                                </div>-->
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @include('profile_section.timeline')

            @include('profile_section.about')

            @include('profile_section.friend')

            @include('profile_section.photos')







        </div>
    </div>
    
</div>

@include('footer')