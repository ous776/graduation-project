@include('header')

@include('left_sidebar')

@include('navbar')

@include('right_sidebar')

<!-- loader Start -->
<div id="loading" style="display: none;">
   <div id="loading-center">
   </div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->

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
                        <img width="651x" height="300px" src="../assets/images/page-img/jobbg8.png">
                        <br><br><br>
                     </div>
                     <div class="user-detail text-center mb-3">
                        <div class="profile-img">
                           <img src="../assets/images/page-img/jobpp.png" alt="profile-img" loading="lazy" class="avatar-130 img-fluid" />
                        </div>
                        <div class="profile-detail">
                           <h3 class="">Job Offers</h3>
                        </div>
                     </div>
                     <div class="profile-info p-3 d-flex align-items-center justify-content-between position-relative">
                     </div>
                  </div>
               </div>
            </div>
         </div>

         @include('profile_section.jobline')

      </div>
   </div>

</div>
@include('footer')