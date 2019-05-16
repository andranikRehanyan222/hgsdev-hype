<?php $__env->startSection('template_title'); ?>
    <?php echo e(__('Order No. ') . $data->id); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_linked_css'); ?>
    <link href="/assets/css/ecommerce/product-details-1.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/plugins/dropify/dropify.min.css">
    <link href="/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    

<div class="container">
<div class="row layout-spacing">



<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
<div class="edu-experience product-detail-1">
    <div class="info product-detailing">
        <h4 class="mt-4">Details</h4>

<ul class="info-list list-unstyled mb-0">
    <li class="w-50">
        <span class="info-list-title ">Products:</span>
        <span class="info-list-text"><?php echo e($data->text); ?></span>
    </li>
    <li class="w-50">
        <span class="info-list-title">Instagram account:</span>
        <span class="info-list-text">
            <?php echo e($data->account->username); ?>

        </span>
    </li>
    <li class="w-50">
        <span class="info-list-title">
Status:
        </span>
        <span class="info-list-text">
        	<?php echo e($data->transaction_status); ?>

        </span>
    </li>
    <li class="w-50">
        <span class="info-list-title">
Transaction Cost:
        </span>
        <span class="info-list-text">
        	$<?php echo e($data->transaction_cost); ?>

        </span>
    </li>
    <li class="w-50">
        <span class="info-list-title">
Transaction ID:
        </span>
        <span class="info-list-text">
        	<?php echo e($data->transaction_id); ?>

        </span>
    </li>
    <li class="w-50">
        <span class="info-list-title">
Payer ID:
        </span>
        <span class="info-list-text">
        	<?php echo e($data->payer_id); ?>

        </span>
    </li>
    <li class="w-50">
        <span class="info-list-title">
Payment ID:
        </span>
        <span class="info-list-tex1t">
        	<?php echo e($data->payment_id); ?>

        </span>
    </li>
</ul>

        <h5 class="">
        	
        	
    	</h5>

        
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