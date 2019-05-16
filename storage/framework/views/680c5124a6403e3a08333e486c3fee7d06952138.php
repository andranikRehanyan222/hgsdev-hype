<?php $__env->startSection('template_title', __('Home page')); ?>

<?php $__env->startSection('content'); ?>


<style>
#home_page .icon-item i{
  font-size: 4em;
  display: block;
}
</style>

<div class="container" id="home_page">
<div class="card">


<div class="card-body">
    <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    
<div class="row">
    <div class="col-md-6 text-center icon-item">
        <?php if(Auth::user()->role == 'admin'): ?>
        <a href="<?php echo e(route('users')); ?>"><i class="flaticon-user-group"></i>
            Users
        </a>
        <?php endif; ?>
    </div>

</div>
                    

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>