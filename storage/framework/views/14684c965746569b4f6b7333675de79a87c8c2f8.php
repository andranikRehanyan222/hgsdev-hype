<?php $__env->startSection('template_title'); ?>
<?php echo __('Support request'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
<link href="assets/css/ui-kit/custom-typography.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/plugins/table/datatable/datatables.css">    
<link rel="stylesheet" type="text/css" href="/assets/css/ecommerce/order.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 pt-3">
                        
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area typo-section">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table id="ecommerce-order-list" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Followed</th>
                                        <th>Follower</th>
                                        
                                        <th class="align-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="usr-img mr-2">
                                                <a href="<?php echo e(route('accounts.show', $value->id)); ?>">
                                                    <img alt="Profile image" src="<?php echo e($value->avatar); ?>" class="br-30" style="max-height: 150px; max-width: 150px;">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('accounts.show', $value->id)); ?>">
                                                <?php echo e($value->username); ?> <i class="flaticon-bar-chart-1"></i>
                                            </a>
                                        </td>
                                        <td><?php echo e($value->followed_count); ?></td>
                                        <td><?php echo e($value->follower_count); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('accounts.delete', ['account' => $value->id])); ?>"  onclick="return confirm('Are you sure you want to delete this account?');">
                                                <i class="flaticon-delete-1"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No account
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('template_scripts'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    var base_url = '<?php echo e(URL::to('/')); ?>';
    function support(insta_id){
        swal({
            title: "Are you sure?",
            text: "Do you want to generate support request?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url:base_url+'/support/add/'+insta_id,
                    method:'get',
                    success:function(data){
                        if(data == '1'){
                            swal("Support request generated, Admin will resolve it shortly.", {
                                icon: "success",
                            });
                        }else{
                            swal("Sorry, Something went wrong please try again later!");
                        }
                        $('.close').trigger('click');
                    }
                });
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>