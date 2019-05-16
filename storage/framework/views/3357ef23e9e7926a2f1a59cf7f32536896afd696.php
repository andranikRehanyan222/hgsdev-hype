<?php $__env->startSection('template_title'); ?>
    <?php echo __('Instagram account'); ?>: <?php echo e($data->username); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_linked_css'); ?>
    <link rel="stylesheet" type="text/css" href="/plugins/dropify/dropify.min.css">
    <link href="/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


<div class="container">                    
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
            <form class="general-info">
                <div class="info">                           
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="upload ml-md-5 mt-4 pr-md-4">
        <img alt="Profile image" src="<?php echo e($data->avatar); ?>" class="br-30" style="max-height: 150px; max-width: 150px;">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 mt-md-0 mt-4">     
                            <h5 class="mt-2 pb-2">
                                Username: 
                                <b><?php echo e($data->username); ?></b>
                            </h5>

                            <h6>
                                Follower: <?php echo e($data->follower_count); ?>

                            </h6>

                            <h6>
                                Followed: <?php echo e($data->followed_count); ?>

                            </h6>

                            <h6>
                                Media: <?php echo e($data->media_count); ?>

                            </h6>

follower_count
followed_count
                            <div class="form">
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control mb-4" id="firstName" placeholder="Shaun">
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control mb-4" id="lastName" placeholder="Park">
                                </div>
                                <div class="form-group">
                                    <label for="profession">Profession</label>
                                    <input type="text" class="form-control mb-4" id="profession" placeholder="Designer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="save-info">
                    <div class="row">
                        <div class="col-md-11 mx-auto">
                            <button class="btn btn-gradient-warning mb-4 float-right btn-rounded">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>







<div class="container">
<div class="row layout-spacing">



<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
<form class="edu-experience" method="POST" action="<?php echo e(route('accounts.create')); ?>">
     <?php echo csrf_field(); ?>
    <div class="info">
        <h3 class="mt-4">Username: 
            <b><?php echo e($data->username); ?></b>
        </h3>
        <h4 class="mt-4">Username: 
            <b><?php echo e($data->username); ?></b>
        </h4>
        <h5 class="mt-4">Username: 
            <b><?php echo e($data->username); ?></b>
        </h5>

        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username"></label>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control mb-4" name="password" id="password" placeholder="Password">
                        </div>
                    </div>                                    

                <div class="save-info">
                    <div class="row">
                        <div class="col-md-11 mx-auto">
                            <button class="btn btn-gradient-warning mb-4 float-right btn-rounded">Save</button>
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


<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_scripts'); ?>
    <script src="/assets/js/users/calendar.js"></script>
    <script src="/assets/js/users/custom-profile.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>