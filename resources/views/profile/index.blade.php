@extends('layouts.app')

@section('template_title')
    {!! __('Profile') !!}
@endsection


@section('template_linked_css')
    <link href="/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
@endsection



@section('content')
    

<div class="container">
<div class="row layout-spacing">

    <!-- Content -->
    <div class="col-sm-12">
        <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">

                <div class="profile-info-section mb-4">
                    <div class="card" style="">
                        <div class="card-body">
                            <h4 class="mb-4"><i class="flaticon-user-plus"></i> Profile info</h4>                                                
                            <p class="mb-3"><span class="usr-work-position">Project Manager </span> at <a href="">DesignReset</a></p>
                            <p class="mb-4"><span class="usr-work-position">3D Artist and Animator</span> at <a href="">Concept Agency</a></p>
                            <p>Lives in Los Angeles, CA</p>
                            <p>Joined March 2014</p>
                            <p>Followed by 256 people</p>                                                
                            <p>Joined 17 Groups</p>
                        </div>
                    </div>
                </div>

                <div class="friends-section mb-4">
                    <div class="card" style="">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class=""><i class="flaticon-user-7"></i> Friends</h4>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"><img alt="admin-profile" src="assets/img/90x90.jpg"></li>
                                        <li class="list-inline-item"><img alt="admin-profile" src="assets/img/90x90.jpg"></li>
                                        <li class="list-inline-item"><img alt="admin-profile" src="assets/img/90x90.jpg"></li>
                                        <li class="list-inline-item"><img alt="admin-profile" src="assets/img/90x90.jpg"></li>
                                        <li class="list-inline-item"><img alt="admin-profile" src="assets/img/90x90.jpg"></li>
                                        <li class="list-inline-item"><img alt="admin-profile" src="assets/img/90x90.jpg"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-xl-9 order-xl-0 col-lg-12 order-1 col-md-12 col-sm-12">
                <div class="tab-content post-section" id="pills-tabContent1">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="card post-editor mb-4" style="">
                                    <div class="card-body p-0">
                                        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                                            <li class="nav-item text-sm-left text-center">
                                                <a class="nav-link active" id="pills-status-tab" data-toggle="pill" href="#pills-status" role="tab" aria-selected="true"><i class="flaticon-copy-line"></i> Status</a>
                                            </li>
                                            <li class="nav-item text-sm-left text-center">
                                                <a class="nav-link" id="pills-multimedia-tab" data-toggle="pill" href="#pills-multimedia" role="tab" aria-selected="false"><i class="flaticon-display"></i> Media</a>
                                            </li>
                                            <li class="nav-item text-sm-left text-center">
                                                <a class="nav-link" id="pills-blog-post-tab" data-toggle="pill" href="#pills-blog-post" role="tab" aria-selected="false"><i class="flaticon-edit-6"></i> Post</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent2">

                                            <div class="tab-pane fade show active" id="pills-status" role="tabpanel" aria-labelledby="pills-status-tab">
                                                <form>
                                                    <div class="media">
                                                        <img class="mr-3" src="assets/img/200x200.jpg" alt="admin-profile">
                                                        <div class="media-body">
                                                            <div class="form-group">
                                                                <textarea placeholder="What's on your mind" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="pills-multimedia" role="tabpanel" aria-labelledby="pills-multimedia-tab">
                                                <form>
                                                    <div class="media">
                                                        <img class="mr-3" src="assets/img/200x200.jpg" alt="admin-profile">
                                                        <div class="media-body">
                                                            <div class="form-group">
                                                                <textarea placeholder="Upload Media Here" class="form-control" id="exampleFormControlTextarea2" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="pills-blog-post" role="tabpanel" aria-labelledby="pills-blog-post-tab">
                                                <form>
                                                    <div class="media">
                                                        <img class="mr-3" src="assets/img/200x200.jpg" alt="admin-profile">
                                                        <div class="media-body">
                                                            <div class="form-group">
                                                                <textarea placeholder="Write a Post" class="form-control" id="exampleFormControlTextarea3" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="editor-bottom-section">
                                            <div class="row">
                                                <div class="col-sm-6 col-12">
                                                    <ul class="list-inline editor-options">
                                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Add a Picture">
                                                            <a href="javascript:void(0);">
                                                                <i class="flaticon-display-1"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Add a Location">
                                                            <a href="javascript:void(0);">
                                                                <i class="flaticon-location-line"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Record Voice">
                                                            <a href="javascript:void(0);">
                                                                <i class="flaticon-disk"></i>
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Emoji">
                                                            <a href="javascript:void(0);">
                                                                <i class="flaticon-happy-smiling"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6 col-12 text-sm-right">
                                                    <div class="btn-editor-actions">
                                                        <button class="btn btn-outline-default mb-3 ml-2">Preview</button>
                                                        <button class="btn btn-gradient-info mb-3 ml-2">Post Status</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">

                                <div class="card post text-post mb-4" style="">
                                    <div class="card-body">
                                        <div class="media user-meta">
                                            <img class="mr-3" src="assets/img/200x200.jpg" alt="admin-profile">
                                            <div class="media-body">
                                                <h4 class="mt-0">Shaun Park</h4>
                                                <p class="meta-time">11 hours ago</p>
                                            </div>
                                        </div>

                                        <div class="post-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation.</p>
                                        </div>

                                        <ul class="list-inline action-options">
                                            <li class="list-inline-item"><a href="javascript:void(0);"><i class="flaticon-like-1"></i> Like</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0);"><i class="flaticon-chat-bubble-line"></i> Comment</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0);"><i class="flaticon-share-2"></i> Share</a></li>
                                        </ul>

                                        <div class="row people-liked-post">
                                            <div class="col-sm-5 text-center">
                                                <ul class="list-inline people-liked-img">
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg" class="ml-0">
                                                    </li>
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg">
                                                    </li>
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg">
                                                    </li>
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-7 text-sm-left text-center pb-sm-0 pb-4">
                                                <div class="people-liked-post-name">
                                                    <span><a href="">Vincent, Mary</a> and 19 other like this</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media usr-comments">
                                            <img class="mr-3" src="assets/img/200x200.jpg" alt="admin-profile">
                                            <div class="media-body">
                                                <input type="text" class="form-control" placeholder="Write a comment...">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card post image-post mb-4" style="">
                                    <div class="card-body">
                                        <div class="media user-meta">
                                            <img class="mr-3" src="assets/img/200x200.jpg" alt="admin-profile">
                                            <div class="media-body">
                                                <h4 class="mt-0">Shaun Park</h4>
                                                <p class="meta-time">18 hours ago</p>
                                            </div>
                                        </div>

                                        <div class="post-content">
                                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <div class="photo mx-auto text-center">
                                                <img alt="image-sample" src="assets/img/450x300.jpg" class="img-fluid">
                                            </div>
                                        </div>

                                        <ul class="list-inline action-options">
                                            <li class="list-inline-item"><a href="javascript:void(0);"><i class="flaticon-like-1"></i> Like</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0);"><i class="flaticon-chat-bubble-line"></i> Comment</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0);"><i class="flaticon-share-2"></i> Share</a></li>
                                        </ul>

                                        <div class="row people-liked-post">
                                            <div class="col-sm-5 text-center">
                                                <ul class="list-inline people-liked-img">
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg" class="ml-0">
                                                    </li>
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg">
                                                    </li>
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg">
                                                    </li>
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-7 text-sm-left text-center pb-sm-0 pb-4">
                                                <div class="people-liked-post-name">
                                                    <span><a href="">Amy, Dale</a> and 22 other like this</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media usr-comments">
                                            <img class="mr-3" src="assets/img/200x200.jpg" alt="admin-profile">
                                            <div class="media-body">
                                                <input type="text" class="form-control" placeholder="Write a comment...">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card post gallery-post mb-4" style="">
                                    <div class="card-body">
                                        <div class="media user-meta">
                                            <img class="mr-3" src="assets/img/200x200.jpg" alt="admin-profile">
                                            <div class="media-body">
                                                <h4 class="mt-0">Shaun Park</h4>
                                                <p class="meta-time">21 hours ago</p>
                                            </div>
                                        </div>

                                        <div class="post-content">
                                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.</p>

                                            <div class="gallery text-center mx-auto">
                                                <img alt="image-gallery" src="assets/img/220x200.jpg" class="img-fluid mb-3 mt-3 mr-1" style="width: 209px; height: 180px;">
                                                <img alt="image-gallery" src="assets/img/220x200.jpg" class="img-fluid mb-3 mt-3 mr-1" style="width: 209px; height: 180px;">
                                                <img alt="image-gallery" src="assets/img/150x130.jpg" class="img-fluid mb-3 mr-1" style="width: 138px; height: 120px;">
                                                <img alt="image-gallery" src="assets/img/150x130.jpg" class="img-fluid mb-3 mr-1" style="width: 138px; height: 120px;">
                                                <img alt="image-gallery" src="assets/img/150x130.jpg" class="img-fluid mb-3 mr-1" style="width: 138px; height: 120px;">
                                            </div>
                                        </div>

                                        <ul class="list-inline action-options">
                                            <li class="list-inline-item"><a href="javascript:void(0);"><i class="flaticon-like-1"></i> Like</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0);"><i class="flaticon-chat-bubble-line"></i> Comment</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0);"><i class="flaticon-share-2"></i> Share</a></li>
                                        </ul>

                                        <div class="row people-liked-post">
                                            <div class="col-sm-5 text-center">
                                                <ul class="list-inline people-liked-img">
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg" class="ml-0">
                                                    </li>
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg">
                                                    </li>
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg">
                                                    </li>
                                                    <li class="list-inline-item chat-online-usr">
                                                        <img alt="admin-profile" src="assets/img/90x90.jpg">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-7 text-sm-left text-center pb-sm-0 pb-4">
                                                <div class="people-liked-post-name">
                                                    <span><a href="">Luke, Daisy</a> and 32 other like this</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media usr-comments">
                                            <img class="mr-3" src="assets/img/200x200.jpg" alt="admin-profile">
                                            <div class="media-body">
                                                <input type="text" class="form-control" placeholder="Write a comment...">
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
</div>


@endsection


@section('template_scripts')
    <script src="/assets/js/users/calendar.js"></script>
    <script src="/assets/js/users/custom-profile.js"></script>
@endsection