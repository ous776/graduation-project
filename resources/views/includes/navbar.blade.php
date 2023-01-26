
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
       <nav class="navbar navbar-expand-lg navbar-light p-0">
          <div class="iq-navbar-logo d-flex justify-content-between">
             <a href="{{ url('/') }}">
                <img src="../assets/images/logo.png" class="img-fluid" alt="">
                
             </a>
             <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                   <div class="main-circle"><i class="ri-menu-line"></i></div>
                </div>
             </div>
          </div>
          <div class="iq-search-bar device-search">
             <form action="#" class="searchbox">
                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                <input type="text" class="text search-input" placeholder="Search here...">
             </form>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
             data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
             aria-label="Toggle navigation">
             <i class="ri-menu-3-line"></i>
          </button>

          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav  ms-auto navbar-list">
                <li>
                   <a href="{{ url('/') }}" class="  d-flex align-items-center">
                      <i class="ri-home-line"></i>
                   </a>
                </li>
             
                @include('top_navbar/notification')

                @include('top_navbar/message')
              
                @include('top_navbar/profile')

             </ul>
          </div>
       </nav>
    </div>
 </div>