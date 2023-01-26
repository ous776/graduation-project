@include('header')

@include('left_sidebar')

@include('navbar')

@include('right_sidebar')

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Rubik", sans-serif;
    }

    body {
        background-color: #f5f8ff;
    }

    .container {
        width: 60%;
        min-width: 450px;
        position: relative;
        margin: 50px auto;
        border-radius: 7px;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.05);
    }

    input[type="file"] {
        display: none;
    }

    label {
        display: block;
        position: relative;
        background-color: #50b5ff;
        color: #ffffff;
        font-size: 18px;
        text-align: center;
        width: 300px;
        padding: 18px;
        margin: auto;
        border-radius: 5px;
        cursor: pointer;
    }

    .container p {
        text-align: center;
        margin: 20px 0 30px 0;
    }

    #images {
        width: 90%;
        position: relative;
        margin: auto;
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
    }

    figure {
        width: 45%;
    }

    img {
        width: 100%;
    }

    figcaption {
        text-align: center;
        font-size: 2.4vmin;
        margin-top: 0.5vmin;
    }
</style>
<div class="position-relative">
</div>
<div id="content-page" class="content-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                        <div class="card-body p-0">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div id="post-modal-data" class="card card-block">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="header-title">
                                                <h4 class="card-title">Create Event</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="user-img">
                                                    <img src="{{Auth::user()->profile_photo_url}}" alt="userimg" class="avatar-60 rounded-circle">
                                                </div>
                                                <form class="post-text ms-3 w-100 " data-bs-toggle="modal" data-bs-target="#post-modal" action="javascript:void();">
                                                    <input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
                                                </form>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="modal fade" id="post-modal" tabindex="-1" aria-labelledby="post-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog   modal-fullscreen-sm-down">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="post-modalLabel">Create Event</h5>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="ri-close-fill"></i></button>
                                                    </div>
                                                    <div class="modal-body" style="width: 570px; height:450px; white-space: nowrap; overflow-x: scroll;">
                                                        <div class="d-flex align-items-center">
                                                            <div class="user-img">
                                                                <img src="{{Auth::user()->profile_photo_url}}" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                            </div>
                                                            <form method="POST" class="post-text ms-3 w-100" action="{{route('posts.store')}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <input name="message" type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
                                                                <ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
                                                                    <li class="col-md-6 mb-3">
                                                                        <div class="container">
                                                                            <input name="media[]" type="file" id="file-input" accept="image/png, image/jpeg, image/jpg" onchange="preview()" multiple>
                                                                            <label for="file-input">
                                                                                <i class="fas fa-upload"></i> &nbsp; Upload Photo
                                                                            </label>
                                                                            <p id="num-of-files">No Files Chosen</p>
                                                                            <div id="images"></div>
                                                                        </div>
                                                                        <script src="../assets/js/script.js"></script>
                                                                    </li>
                                                                </ul>
                                                        </div>
                                                        <hr>
                                                        <hr>
                                                        <button type="submit" class="btn btn-primary d-block w-100 mt-3">Post</button>
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
                </div>
            </div>

        </div>

        @include('footer')