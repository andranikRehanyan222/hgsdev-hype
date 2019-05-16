<?php $__env->startSection('template_title', __('Login')); ?>

<?php $__env->startSection('class_body', 'login'); ?>


<?php $__env->startSection('template_linked_css'); ?>

    <link href="/assets/css/users/login-1.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>




<form method="POST" action="<?php echo e(route('login')); ?>"  class="form-login">
                        <?php echo csrf_field(); ?>

        <div class="row">
            
            <div class="col-md-12 text-center mb-4">
                
                <img alt="logo" src="<?php echo e(asset('img/hypegroups.jpg')); ?>" width="100%">
            </div>

            <div class="col-md-12">

                <label for="inputEmail" class="sr-only"><?php echo e(__('E-Mail Address')); ?></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-inputEmail"><i class="flaticon-user-7"></i> </span>
                    </div>
    <input value="<?php echo e(old('email')); ?>" type="email" name="email" id="inputEmail" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Email Address" aria-describedby="inputEmail" required >


<?php if($errors->has('email')): ?>
    <span class="invalid-feedback" role="alert">
        <strong><?php echo e($errors->first('email')); ?></strong>
    </span>
<?php endif; ?>

                </div>

                <label for="inputPassword" class="sr-only"><?php echo e(__('Password')); ?></label>                
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-inputPassword"><i class="flaticon-key-2"></i> </span>
                    </div>
                    <input type="password" name="password" id="inputPassword" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Password" aria-describedby="inputPassword" required >

<?php if($errors->has('password')): ?>
    <span class="invalid-feedback" role="alert">
        <strong><?php echo e($errors->first('password')); ?></strong>
    </span>
<?php endif; ?>
                </div>
                
                <div class="checkbox d-flex justify-content-center mt-3">
                    <div class="custom-control custom-checkbox mr-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" value="remember-me" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="customCheck1"><?php echo e(__('Remember Me')); ?></label>
                    </div>
                </div>

                <button class="btn btn-lg btn-gradient-warning btn-block btn-rounded mb-4 mt-5" type="submit"><?php echo e(__('Login')); ?></button>

                <div class="forgot-pass text-center">
                    <a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot Your Password?')); ?></a>
                </div>

            </div>

            <div class="col-md-12">
                <div class="login-text text-center">
                    <p class="mt-3 text-white">New Here? <a href="<?php echo e(route('register')); ?>" class="">Register </a> a new user !</p>
                </div>
            </div>

        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>