@include('header')

@include('left_sidebar')

@include('navbar')


<!-- Page Content  -->
<div class="header-for-bg">
    <div class="background-header position-relative">
        <img src="../assets/images/page-img/profile-bg6.jpg" class="img-fluid w-100" alt="header-bg" loading="lazy">
        <div class="title-on-header">
            <div class="data-block">
                <h2>Calender and Events</h2>
            </div>
        </div>
    </div>
</div>
<!-- Page Content  -->
</div>
<div id="content-page" class="content-page">
    <div class="container">
        <div class="row row-eq-height">
            <div class="col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group d-block">
                            <div class="vanila-datepicker"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title ">Classification</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <a href="#" class="material-symbols-outlined">
                                add
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="m-0 p-0 job-classification list-inline">
                            <li class=" d-flex align-items-center"><i
                                    class="material-symbols-outlined md-18 bg-primary">check_circle</i>Meeting</li>
                            <li class=" d-flex align-items-center"><i
                                    class="material-symbols-outlined md-18 bg-success">check_circle</i>Business travel
                            </li>
                            <li class=" d-flex align-items-center"><i
                                    class="material-symbols-outlined md-18 bg-warning">check_circle</i>Personal Work
                            </li>
                            <li class=" d-flex align-items-center"><i
                                    class="material-symbols-outlined md-18 bg-info">check_circle</i>Team Project</li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Today's Schedule</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="m-0 p-0 today-schedule">
                            <li class="d-flex">
                                <div class="schedule-icon"><i
                                        class="material-symbols-outlined text-primary md-18">fiber_manual_record</i>
                                </div>
                                <div class="schedule-text"> <span>Web Design</span>
                                    <span>09:00 to 12:00</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="schedule-icon"><i
                                        class="material-symbols-outlined text-success md-18">fiber_manual_record</i>
                                </div>
                                <div class="schedule-text"> <span>Participate in Design</span>
                                    <span>09:00 to 12:00</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        <div class="header-title">
                            <h4 class="card-title">Book Appointment</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center mt-1 mt-md-0">
                            <a href="#" class="btn btn-primary d-flex align-items-center"><i
                                    class="material-symbols-outlined me-1 md-18">add</i>Book Appointment</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="calendar1" class="calendar-s"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@include('right_sidebar')


@include('footer')
