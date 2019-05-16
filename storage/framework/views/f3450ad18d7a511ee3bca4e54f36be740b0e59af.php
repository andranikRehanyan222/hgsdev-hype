<?php $__env->startSection('template_title', __('Register')); ?>

<?php $__env->startSection('class_body', 'register'); ?>

<?php $__env->startSection('template_linked_css'); ?>

    <link href="/assets/css/users/register-1.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<form class="form-register" method="POST" action="<?php echo e(route('register')); ?>">
<?php echo csrf_field(); ?>

<div class="row">

    <div class="col-md-12 text-center mb-4">
        <img alt="logo" src="assets/img/logo-5.png" class="theme-logo">
    </div>
    <div class="col-md-12">

        <label for="full-name" class=""><?php echo e(__('Name')); ?></label>
        <?php if($errors->has('name')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('name')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="text" id="full-name" class="form-control mb-4<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Name')); ?>" required autofocus >




        <label for="inputEmail" class=""><?php echo e(__('E-Mail Address')); ?></label>
        <?php if($errors->has('email')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="email" id="inputEmail" class="form-control mb-4<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('E-Mail Address')); ?>" required >



        <label for="inputPassword" class=""><?php echo e(__('Password')); ?></label>
        <?php if($errors->has('password')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="password" id="inputPassword" class="form-control mb-5<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Password')); ?>" name="password" required>


        <label for="inputRepeatPassword" class=""><?php echo e(__('Confirm Password')); ?></label>
        <input type="password" id="inputRepeatPassword" class="form-control mb-5" placeholder="<?php echo e(__('Confirm Password')); ?>" name="password_confirmation" required>
                    
        <button class="btn btn-lg btn-gradient-danger btn-block btn-rounded mb-4 mt-5" type="submit"><?php echo e(__('Register')); ?></button>
    </div>


</div>
</form>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>