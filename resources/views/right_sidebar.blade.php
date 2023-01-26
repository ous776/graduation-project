<div class="right-sidebar-mini right-sidebar">
   <div class="right-sidebar-panel p-0">
      <div class="card shadow-none">
         <div class="card-body p-0">
            @foreach(auth()->user()->friends as $friendship)
            <div class="media-height p-3" data-scrollbar="init">
               <div class="d-flex align-items-center mb-4">
                  <div class="iq-profile-avatar {{ $friendship->friend->online ? 'status-online' : ''}}">
                     <img class="rounded-circle avatar-50" src="{{ $friendship->friend->profile_photo_url }}" alt="">
                  </div>
                  <div class=" ms-3">
                     <h6 class="mb-0">{{ $friendship->friend->full_name }}</h6>
                     @if($friendship->friend->online)
                     <p class="mb-0">Online</p>
                     @endif
                  </div>
               </div>
            </div>
            @endforeach
            <div class="right-sidebar-toggle bg-primary text-white ">
               <i class="ri-arrow-left-line side-left-icon"></i>
               <i class="ri-arrow-right-line side-right-icon"><span class="ms-3 d-inline-block">Close
                     Menu</span></i>
            </div>
         </div>
      </div>
   </div>
</div>