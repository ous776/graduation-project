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
                                <div class="col-lg-10">
                                    <div id="post-modal-data" class="card card-block">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="header-title">
                                                <h4 class="card-title">Create News</h4>
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
                                                        <h5 class="modal-title" id="post-modalLabel">Create News</h5>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="ri-close-fill"></i></button>
                                                    </div>
                                                    <div class="modal-body" style="width: 570px; height:450px; white-space: nowrap; overflow-x: scroll;">
                                                        <div class="d-flex align-items-center">
                                                            <div class="user-img">
                                                                <img src="{{Auth::user()->profile_photo_url}}" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                            </div>
                                                            <form method="POST" class="post-text ms-3 w-100" action="{{route('news.store')}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <input name="title" type="text" class="form-control rounded" placeholder="Title.." style="border:none;">
                                                                <input name="content" type="text" class="form-control rounded" placeholder="Write message here..." style="border:none;">
                                                                <ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
                                                                    <li class="col-md-6 mb-3">
                                                                        <div class="container">
                                                                            <input name="image[]" type="file" id="file-input" accept="image/png, image/jpeg, image/jpg" onchange="preview()" multiple>
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
                                    @foreach($news as $new)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="post-item">
                                                <div class="user-post-data pb-3">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="me-3">
                                                            <img class="rounded-circle  avatar-60" src="{{$new->author->profile_photo_url}}" alt="" loading="lazy">
                                                        </div>
                                                        <div class="w-100">
                                                            <div class="d-flex justify-content-between flex-wrap">
                                                                <div class=""><br>
                                                                    <h5 class="mb-0 d-inline-block"><a href="#" class="">{{$new->author->full_name}}</a></h5>
                                                                </div>
                                                                <div class="card-post-toolbar">
                                                                    <div class="dropdown">
                                                                        <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                            <i class="ri-more-fill"></i>
                                                                        </span>
                                                                        <div class="dropdown-menu m-0 p-0">
                                                                            <form id="post-delete-{{ $post->id }}" method="post" action="{{ route('delete-post', $post->id) }}">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <a href="javascript:;" class="dropdown-item p-3" onclick="document.getElementById('post-delete-{{ $post->id }}').submit()">
                                                                                    <div class="d-flex align-items-top">
                                                                                        <div class="h4">
                                                                                            <i class="ri-save-line"></i>
                                                                                        </div>
                                                                                        <div class="data ms-2">
                                                                                            <h6>Delete Post</h6>
                                                                                            <p class="mb-0">Delete this from jobline</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-post">
                                                    <h3>{{$new->title}}</h3>
                                                    <p>{{$new->content}}</p>
                                                </div>
                                                @if($new->image)
                                                <div class="user-post">
                                                    <div class=" d-grid grid-rows-2 grid-flow-col gap-3">
                                                        @foreach(json_decode($new->image,true) as $image)
                                                        <div class="row-span-2 row-span-md-1">
                                                            <img src="{{url('/storage/'.$image)}}" alt="post-image" class="img-fluid rounded w-100">
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="comment-area mt-3">
                                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                        <div class="like-block position-relative d-flex align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <div class="like-data">
                                                                    <div class="dropdown">
                                                                        <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                            <img src="../assets/images/icon/01.png" class="img-fluid" alt="">
                                                                        </span>
                                                                        <div class="dropdown-menu py-2">
                                                                            <a class="ms-2 me-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Like"><img src="../assets/images/icon/01.png" class="img-fluid" alt=""></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="total-like-block ms-2 me-3">
                                                                    <div class="dropdown">
                                                                        <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                            140 Likes
                                                                        </span>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Max Emum</a>
                                                                            <a class="dropdown-item" href="#">Other</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="total-comment-block">
                                                                <div class="dropdown">
                                                                    <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                        20 Comment
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="share-block d-flex align-items-center feather-icon mt-2 mt-md-0">
                                                            <a href="javascript:void();" data-bs-toggle="offcanvas" data-bs-target="#share-btn" aria-controls="share-btn"><i class="ri-share-line"></i>
                                                                <span class="ms-1">99 Share</span></a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <ul class="post-comments p-0 m-0">
                                                        <li class="mb-2">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="user-img">
                                                                    <img src="../assets/images/user/02.jpg" loading="lazy" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                                                </div>
                                                                <div class="comment-data-block ms-3">
                                                                    <h6>Monty Carlo</h6>
                                                                    <p class="mb-0">Lorem ipsum dolor sit amet</p>
                                                                    <div class="d-flex flex-wrap align-items-center comment-activity">
                                                                        <a href="#">like</a>
                                                                        <span> 5 min </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex flex-wrap">
                                                                <div class="user-img">
                                                                    <img src="../assets/images/user/03.jpg" alt="userimg" class="avatar-35 rounded-circle img-fluid" loading="lazy">
                                                                </div>
                                                                <div class="comment-data-block ms-3">
                                                                    <h6>Paul Molive</h6>
                                                                    <p class="mb-0">Lorem ipsum dolor sit amet</p>
                                                                    <div class="d-flex flex-wrap align-items-center comment-activity">
                                                                        <a href="#">like</a>
                                                                        <span> 5 min </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                                                        <input type="text" class="form-control rounded" placeholder="Enter Your Comment">
                                                        <div class="comment-attagement d-flex">
                                                            <a href="javascript:void();"><i class="ri-link me-3"></i></a>
                                                            <a href="javascript:void();"><i class="ri-user-smile-line me-3"></i></a>
                                                            <a href="javascript:void();"><i class="ri-camera-line me-3"></i></a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @include('footer')