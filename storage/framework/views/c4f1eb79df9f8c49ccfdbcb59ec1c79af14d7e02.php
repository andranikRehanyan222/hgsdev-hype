<?php $__env->startSection('template_title'); ?>
    <?php echo e(__('Powerlikes')); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('template_h1'); ?>

<?php if(trim($__env->yieldContent('template_title'))): ?><?php echo $__env->yieldContent('template_title'); ?> <?php endif; ?> 

<?php if(Auth::user()->role == 'admin'): ?>
<a href="<?php echo e(route('powerlikes.reload')); ?>" class="btn btn-gradient-primary btn-rounded d-inline">
<i class="flaticon-circle-reload-line"></i> Reload from Fuelgram</a>
<?php endif; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_linked_css'); ?>
    <link href="/assets/css/ecommerce/product-details-1.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    

<div id="product-catalog-container" class="container product-detail-1">

<?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>



<?php if($key % 2 == 0): ?>
<div class="row">
<?php endif; ?>


<div class="col-xl-6 col-lg-6 col-md-6 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area product-cat1">
            <div class="mb-4">
                <div class="order-xl-1 order-md-2 order-sm-1 order-2 product-detailing">

<?php if(Auth::user()->role == 'admin'): ?>
<a href="<?php echo e(route('powerlikes.edit', ['id' => $value->id])); ?>" class="btn btn-gradient-primary btn-rounded float-right">
<i class="flaticon-edit-6"></i> Edit
</a>
<?php endif; ?>

                    <h3>
                        <a href="<?php echo e(route('powerlikes.show', ['id' => $value->id])); ?>">
                            <?php echo e($value->name); ?>

                        </a>
                    </h3>

                    <p class="card-text1">$<?php echo e($value->cost); ?></p>

<div class="form-row product-btn-cart">
    <div class="form-group col-md-6">
        <a class="btn btn-dark" href="<?php echo e(route('order.add', ['product' => $value->id])); ?>">Add to cart</a>
    </div>
</div>


id: <?php echo e($value->id); ?> <br/>
id fuelgram: <?php echo e($value->id_fg); ?> <br/>
leap: <?php echo e($value->leap); ?> <br/>
is_deleted: <?=$value->is_deleted? 'true' : 'false'?> <br/>
is_disabled: <?=$value->is_disabled? 'true' : 'false'?> <br/>
is_reseller: <?=$value->is_reseller? 'true' : 'false'?> <br/>
duration: <?php echo e($value->duration); ?> <br/>
one_time_payment: <?=$value->one_time_payment? 'true' : 'false'?> <br/>
allow_trial: <?=$value->allow_trial? 'true' : 'false'?> <br/>
trial_duration: <?php echo e($value->trial_duration); ?> <br/>

                    <?php if($value->addons()): ?>
<div class="border m-1 p-2">
<b>Addons:</b>
<br/>
name: <?php echo e($value->addons()->name); ?><br/>
required: <?=$value->addons()->required? 'true' : 'false'?><br/>
cost: <?php echo e($value->addons()->cost); ?><br/>
min_quantity: <?php echo e($value->addons()->min_quantity); ?><br/>
max_quantity: <?php echo e($value->addons()->max_quantity); ?><br/>
plan: <?php echo e($value->addons()->plan); ?><br/>
</div>
                    <?php endif; ?>





                </div>
            </div>
        </div>
    </div>
</div>

<?php if($key & 1): ?>
</div>
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<p>
    No products
</p>
<?php endif; ?>


</div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>