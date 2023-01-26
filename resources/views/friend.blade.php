@include('header')

@include('left_sidebar')

@include('navbar')
<div id="content-page" class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Friend List</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="request-list list-inline m-0 p-0">
                            @forelse ($principal->friends as $friendship)
                            <li class="d-flex align-items-center  justify-content-between flex-wrap">
                                <div class="user-img img-fluid flex-shrink-0">
                                    <img src="{{$friendship->friend->profile_photo_url}}" alt="story-img" class="rounded-circle avatar-40">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>{{$friendship->friend->full_name}}</h6>
                                </div>
                                <div class="d-flex align-items-center mt-2 mt-md-0">
                                    <div class="confirm-click-btn">
                                        <a href="../app/profile.html" class="me-3 btn btn-primary rounded request-btn" style="display: none;">View All</a>
                                    </div>
                                    <form method="POST" action="{{route('delete-friend', $friendship->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-secondary rounded">Delete Friend</button>
                                    </form>
                                </div>
                            </li>
                            @empty
                            <li class="d-flex align-items-center  justify-content-between flex-wrap">
                                <div class="text-sm text-center text-muted">You have no friend yet.</div>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                @if($users->count() > 0)
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">People You May Know</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="request-list m-0 p-0">
                            @foreach ($users as $user)
                            <li class="d-flex align-items-center  flex-wrap">
                                <div class="user-img img-fluid flex-shrink-0">
                                    <img src="{{$user->profile_photo_url}}" alt="story-img" class="rounded-circle avatar-40">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>{{$user->full_name}}</h6>
                                </div>
                                <div class="d-flex align-items-center mt-2 mt-md-0">
                                    <form method="POST" action="{{route('add-friend', $user->id)}}">
                                        @csrf
                                        <button type="submit" class="me-3 btn btn-primary rounde d-flex align-items-center">
                                            Add Friend
                                        </button>
                                    </form>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@include('right_sidebar')

@include('footer')