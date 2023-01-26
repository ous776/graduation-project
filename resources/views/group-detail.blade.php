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
                        <img width="651x" height="300px" src="../assets/images/page-img/it.png">
                        <br><br><br>
                     </div>
                     <div class="user-detail text-center mb-3">
                        <div class="profile-img">
                           <img src="{{ $group->photo ? url('/storage/'. $group->photo) : '../assets/images/page-img/pp.png'}}" alt="profile-img" loading="lazy" class="avatar-130 img-fluid" />
                        </div>
                        <div class="profile-detail">
                           <h3 class="">{{ $group->name }}</h3>
                           <!-- <p>{{ $group->description }}</p>-->
                           @if(!Auth::user()->isMember($group))
                           <form method="post" action="{{ route('join-group', $group->id) }}">
                              @csrf
                              <div class="row justify-content-center">
                                 <div class="col-md-4 text-center">
                                    <button type="submit" class="btn btn-primary d-block w-100">Join</button>
                                 </div>
                              </div>
                           </form>
                           @endif
                        </div>
                     </div>
                     <div class="profile-info p-3 d-flex align-items-center justify-content-between position-relative">
                     </div>
                  </div>
               </div>
            </div>
         </div>

         @include('profile_section.groupline')

      </div>
   </div>

</div>
@include('footer')