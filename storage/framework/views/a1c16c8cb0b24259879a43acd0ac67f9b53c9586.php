<?php $__env->startSection('template_title'); ?>
    <?php echo e(__('Products')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <?php echo $__env->make('laravelusers::partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('laravelusers::partials.bs-visibility-css', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo 'Showing All Products'; ?>

                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table" id="productTable">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e(ucfirst($product->name)); ?></td>
                                            <td><?php echo e(ucfirst($product->types)); ?></td>
                                            <td><?php echo e($product->cost); ?></td>
                                            <td><span id="status_<?php echo e($product->id); ?>" onclick="updateStatus(this,'<?php echo e($product->id); ?>')" data-status="<?php echo e($product->status); ?>" class="btn btn-sm btn-<?php echo e($product->status ? 'success' : 'danger'); ?>"><?php echo e($product->status ? 'Active' : 'De-Actived'); ?></span></td>
                                            <td>
                                                <a href="<?php echo e(route('product.edit', $product->id)); ?>" class="btn btn-default btn-sm"><i class="icon-search"></i> Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_scripts'); ?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('#productTable').dataTable();
        var base_url = '<?php echo e(URL::to('/')); ?>';

        function updateStatus(input,id){
        var status = $(input).attr('data-status');
        swal({
            title: "Are you sure?",
            text: "Do you want to change status of product",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url:base_url+'/changeProductStatus/'+id,
                    method:'get',
                    success:function(data){
                        if(data == '1'){
                            if(status == '1'){
                                $(input).removeClass('btn-success');
                                $(input).addClass('btn-danger');
                                $(input).html('De-Actived');
                            }else{
                                $(input).removeClass('btn-danger');
                                $(input).addClass('btn-success');
                                $(input).html('Active');
                            }
                            $(input).attr('data-status',status == 1 ?0:1);
                            swal("Status has been changed", {
                                icon: "success",
                            });
                        }else{
                            swal("Sorry, Something went wrong please try again later!");
                        }
                    }
                });
            }
        });
    }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>