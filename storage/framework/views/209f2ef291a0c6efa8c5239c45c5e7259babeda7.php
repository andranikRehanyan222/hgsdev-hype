<?php $__env->startSection('template_title'); ?>
<?php echo e(__('Orders')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<link rel="stylesheet" type="text/css" href="/plugins/table/datatable/datatables.css">    
<link rel="stylesheet" type="text/css" href="/assets/css/ecommerce/order.css">

<div id="product-catalog-container" class="container">



    <div class="widget-content widget-content-area">
        <div class="table-responsive mb-4">
            <table id="ecommerce-order-list" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Order No.</th>
                        <th>Name</th>
                        <th>Price</th>
                        <?php if(Auth::user()->role == 'admin'): ?>
                        <th>Order By</th>
                        <?php endif; ?>
                        <th>Email</th>
                        <th class="align-center">Status</th>
                        <th class="align-center">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($value->id); ?></td>
                        <td><?php echo e($value->text); ?></td>
                        <td><?php echo e($value->cost); ?></td>
                        <?php if(Auth::user()->role == 'admin'): ?>
                        
                        <td><?php echo e(isset($value->user)? ucfirst($value->user->name) : ''); ?></td>
                        <?php endif; ?>
                        <td><?php echo e($value->user->email); ?></td>
                        <td class="align-center">
                            <?php if ($__env->exists('order.badge.' . $value->transaction_status)) echo $__env->make('order.badge.' . $value->transaction_status, \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </td>
                        <td class="align-center"><a href="<?php echo e(route('order.show', $value->id)); ?>" class="btn btn-default btn-sm"><i class="icon-search"></i> View</a></td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
                        <td colspan="5" class="text-center">
                            No orders
                        </td>
                    </tr>

                    <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>


</div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>