<?php $__env->startSection('template_title'); ?>
    <?php echo __('Instagram account'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_linked_css'); ?>
    <link rel="stylesheet" type="text/css" href="/plugins/dropify/dropify.min.css">
    <link href="/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    

<div class="container">
<div class="row layout-spacing">



<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
<form class="edu-experience" method="POST" action="<?php echo e(route('accounts.create')); ?>">
     <?php echo csrf_field(); ?>
    <div class="info">
        <h5 class="mt-4">Instagram setting</h5>
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control mb-4" name="username" id="username" placeholder="Username" value="<?php echo e($data->username); ?>">
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