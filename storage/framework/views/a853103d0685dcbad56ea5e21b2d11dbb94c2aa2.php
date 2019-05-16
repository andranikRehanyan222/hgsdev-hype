<?php $__env->startSection('template_title'); ?>
    <?php echo __('Setting'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_linked_css'); ?>
    <link href="/assets/css/pages/contact_us.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    

<div class="container">                    
    <div class="contact-us layout-spacing">
        <div class="cu-contact-section">                           
            	<h3>
            		On this page you can edit settings:
            	</h3>
<ul>
	<li>
		<a href="<?php echo e(route('setting.paypal')); ?>">PayPal</a>
	</li>
    <li>
        <a href="<?php echo e(route('setting.stripe')); ?>">Stripe</a>
    </li>
</ul>
        </div>
    </div>
</div>


        <!--  END CONTENT PART  -->



<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_scripts'); ?>
    <script src="/assets/js/users/calendar.js"></script>
    <script src="/assets/js/users/custom-profile.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>