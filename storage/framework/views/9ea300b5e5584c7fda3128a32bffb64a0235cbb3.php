<?php $__env->startSection('template_title'); ?>
    <?php echo __('Order '); ?>

    "<?php echo $data->name; ?>"
<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_linked_css'); ?>
    <link rel="stylesheet" type="text/css" href="/plugins/dropify/dropify.min.css">
    <link href="/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    

<div class="container">
<div class="row layout-spacing">


<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
<div class="edu-experience" method="POST" action="<?php echo e(route('paymenttest.create', ['product' => $data])); ?>" 
 <?php if(count($accounts) < 1): ?>
 onsubmit="return false;"
 <?php endif; ?>
 >
     <?php echo csrf_field(); ?>
    <div class="info">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cost">Cost</label>
                            <b><?php echo e($data->cost); ?></b>
                        </div>
                    </div>        

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cost">Instagram account</label>
                            <select name="account" id="form_account">
<?php $__empty_1 = true; $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<option value="<?php echo e($value->id); ?>"><?php echo e($value->username); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<option>No account</option>
<?php endif; ?>
                            </select>
                        </div>
                    </div>                        

                <div class="save-info">
                    <div class="row">
                            <?php if(count($accounts) > 0): ?>
                        <div class="col-md-11 mx-auto">
                            <button onclick="window.location.href='<?php echo e(route('paymenttest.create', ['product' => $data])); ?>?account=' + $('#form_account').val()" class="btn btn-primary mb-4 float-right btn-rounded">Pay by PayPal</button>
                            
                            <button onclick="window.location.href='<?php echo e(route('stripe.create', ['product' => $data])); ?>?account=' + $('#form_account').val()" class="btn btn-primary mb-4 float-right btn-rounded">Pay with credit card</button>


                        </div>
                            <?php else: ?>
                            Please, add account before order
                            <?php endif; ?>
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

<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>

    <script src="/assets/js/users/calendar.js"></script>
    <script src="/assets/js/users/custom-profile.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>