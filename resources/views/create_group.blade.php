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
                    <h2>Create Group</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content  -->
</div>
<div id="content-page" class="content-page">
    <div class="container">
        <div class="col-lg-12">
            <div class="iq-edit-list-data">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Create Group</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('store_group')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row align-items-center">
                                        <!--class="profile-img-edit"-->
                                        <div class="col-md-12">
                                            <div>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <p>Choose Your Group Profile Picture:&nbsp;&nbsp;</p>
                                                        </td>
                                                        <td>
                                                            <!--
                                                            <div class="profile-img-edit">
                                                                <img class="profile-pic" src="../assets/images/user/pp.png" alt="group-pic" loading="lazy">
                                                                <div class="p-image d-flex align-items-center justify-content-center">
                                                                    <span class="material-symbols-outlined">edit</span>
                                                                    <input name="group_photo" id="upload-pic" class="file-upload" type="file" accept="image/*">
                                                                </div>
                                                            </div>
                                                            -->
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-md-12">
                                                                    <div class="profile-img-edit">
                                                                        <img class="profile-pic" src="../assets/images/user/pp.png" alt="profile-pic" loading="lazy">
                                                                        <div class="p-image d-flex align-items-center justify-content-center">
                                                                            <label for="upload-pic" class="material-symbols-outlined">edit</label>
                                                                            <input name="group_photo" id="upload-pic" class="file-upload" type="file" accept="image/*" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <!--<div class="col-md-12">
                                            <div>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <p>Choose Your Cover Photo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                                        </td>
                                                        <td>
                                                            <div class="profile-img-edit">
                                                                <img class="profile-pic" src="../assets/images/user/cp.png" alt="cover-photo" loading="lazy">
                                                                <div class="p-image d-flex align-items-center justify-content-center">
                                                                    <span class="material-symbols-outlined">edit</span>
                                                                    <input class="file-upload" type="file" accept="image/*">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class=" row align-items-center">
                                        <div class="form-group col-sm-6">
                                            <label for="fname" class="form-label">Group Name:</label>
                                            <input name="group_name" type="text" class="form-control" id="gname" placeholder="Group Name">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="lname" class="form-label">Short Description:</label>
                                            <input name="group_desc" type="text" class="form-control" id="description" placeholder="Description">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')