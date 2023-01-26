@include('header')

@include('left_sidebar')

@include('navbar')

@include('right_sidebar')

<div class="position-relative">
    <!-- Page Content  -->
    <div class="header-for-bg">
        <div class="background-header position-relative">
            <img src="../assets/images/page-img/wp.png" style="max-height: 300px;" class="img-fluid w-100" alt="header-bg" loading="lazy">
            <div class="title-on-header">
                <div class="data-block">
                    <h2>Groups</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content  -->
</div>
<div id="content-page" class="content-page">
    <div class="container">
        <div class="d-grid gap-3 d-grid-template-1fr-19">
            @foreach($groups as $group)
            <div class="card">
                <div class="top-bg-image">
                    <img src="../assets/images/page-img/cp.png" class="img-fluid w-100" alt="group-bg" loading="lazy">
                </div>
                <div class="card-body text-center">
                    <div class="group-icon">
                        <img src="{{ $group->photo ? url('/storage/'. $group->photo) : '../assets/images/page-img/pp.png'}}" alt="profile-img" class="rounded-circle img-fluid avatar-120" loading="lazy">
                    </div>
                    <div class="group-info pt-3 pb-3">
                        <h4><a href="{{route('group-detail', $group->id)}}">{{ $group->name }}</a></h4>
                        <p>{{ $group->description }}</p>
                    </div>
                    <div class="group-details d-inline-block pb-3">
                        <ul class="d-flex align-items-center justify-content-between list-inline m-0 p-0">
                            <li class="pe-3 ps-3">
                                <p class="mb-0">Post</p>
                                <h6>300</h6>
                            </li>
                            <li class="pe-3 ps-3">
                                <p class="mb-0">Members</p>
                                <h6>{{ $group->allMembers->count() }}</h6>
                            </li>
                            <li class="pe-3 ps-3">
                                <p class="mb-0">Visit</p>
                                <h6>25k</h6>
                            </li>
                        </ul>
                    </div>
                    <div class="group-member mb-3">
                        <div class="iq-media-group">
                            <a href="#" class="iq-media">
                                <img class="img-fluid avatar-40 rounded-circle" src="../assets/images/user/05.jpg" alt="" loading="lazy">
                            </a>
                            <a href="#" class="iq-media">
                                <img class="img-fluid avatar-40 rounded-circle" src="../assets/images/user/06.jpg" alt="" loading="lazy">
                            </a>
                            <a href="#" class="iq-media">
                                <img class="img-fluid avatar-40 rounded-circle" src="../assets/images/user/07.jpg" alt="" loading="lazy">
                            </a>
                            <a href="#" class="iq-media">
                                <img class="img-fluid avatar-40 rounded-circle" src="../assets/images/user/08.jpg" alt="" loading="lazy">
                            </a>
                            <a href="#" class="iq-media">
                                <img class="img-fluid avatar-40 rounded-circle" src="../assets/images/user/09.jpg" alt="" loading="lazy">
                            </a>
                            <a href="#" class="iq-media">
                                <img class="img-fluid avatar-40 rounded-circle" src="../assets/images/user/10.jpg" alt="" loading="lazy">
                            </a>
                        </div>
                    </div>
                    @if(Auth::user()->isMember($group))
                    <form method="post" action="{{ route('leave-group', $group->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-success d-block w-100" >Joined</button>
                    </form>
                    @else
                    <form method="post" action="{{ route('join-group', $group->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary d-block w-100">Join</button>
                    </form>
                    @endif

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@include('footer')