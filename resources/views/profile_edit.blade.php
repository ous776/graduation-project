@include('header')

@include('left_sidebar')

@include('navbar')

@include('right_sidebar')

<div class="position-relative"><br><br><br>
</div>
<div id="content-page" class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="iq-edit-list">
                            <ul class="iq-edit-profile row nav nav-pills">
                                <li class="col-md-3 p-0">
                                    <a class="nav-link {{ !session('pwd-tab') ? 'active' : '' }}" data-bs-toggle="pill" href="#personal-information">
                                        Personal Information
                                    </a>
                                </li>
                                <li class="col-md-3 p-0">
                                    <a class="nav-link {{ session('pwd-tab') ? 'active' : '' }}" data-bs-toggle="pill" href="#chang-pwd">
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-edit-list-data">
                    <div class="tab-content">
                        <div class="tab-pane fade {{ !session('pwd-tab') ? 'active show' : '' }}" id="personal-information" role="tabpanel">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Personal Information</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if(session('success'))
                                    <div class='alert alert-success'>
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    <form method="post" action="{{ route('update-profile', $principal->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group row align-items-center">
                                            <div class="col-md-12">
                                                <div class="profile-img-edit">
                                                    <img class="profile-pic" src="{{ $principal->profile_photo_url }}" alt="profile-pic" loading="lazy">
                                                    <div class="p-image d-flex align-items-center justify-content-center">
                                                        <label for="upload-pic" class="material-symbols-outlined">edit</label>
                                                        <input name="profile_photo" id="upload-pic" class="file-upload" type="file" accept="image/*" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" row align-items-center">
                                            <div class="form-group col-sm-6">
                                                <label for="name" class="form-label">Full Name:</label>
                                                <input id="name" name="name" type="text" class="form-control" placeholder="Full Name" value="{{ $principal->full_name }}">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="address" class="form-label">Address:</label>
                                                <input id="address" name="address" type="text" class="form-control" value="{{ $principal->address }}" placeholder="Atlanta">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button type="reset" class="btn bg-soft-danger">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ session('pwd-tab') ? 'active show' : '' }}" id="chang-pwd" role="tabpanel">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Change Password</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if(session('password-success'))
                                    <div class='alert alert-success'>
                                        {{ session('password-success') }}
                                    </div>
                                    @elseif($errors->any())
                                    @foreach($errors->all() as $error)
                                    <div class='alert alert-danger'>
                                        {{ $error }}
                                    </div>
                                    @endforeach
                                    @endif
                                    <form method="post" action="{{ route('update-password', $principal->id) }}">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <label for="cpass" class="form-label">Current Password:</label>
                                            <a href="#" class="float-end">Forgot Password</a>
                                            <input name="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" id="cpass">
                                            @error('current_password')
                                            <span class="text-danger d-block text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="npass" class="form-label">New Password:</label>
                                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="npass">
                                            @error('password')
                                            <span class="text-danger d-block text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="vpass" class="form-label">Verify Password:</label>
                                            <input name="password_confirmation" type="password" class="form-control" id="vpass">
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button type="reset" class="btn bg-soft-danger">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('footer')