<?php $__env->startSection('template_title'); ?>
    <?php echo e(__('Products')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
    <?php echo $__env->make('laravelusers::partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('laravelusers::partials.bs-visibility-css', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <?php echo 'Edit Product : '.ucfirst($product->name); ?>

                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo Form::open(array('route' => ['product.update', $product->id], 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')); ?>

                            <?php echo csrf_field(); ?>

                            <div class="form-group has-feedback row <?php echo e($errors->has('cost') ? ' has-error ' : ''); ?>">
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('cost', $product->cost, array('id' => 'cost', 'class' => 'form-control', 'placeholder' => 'Price')); ?>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="cost">
                                                <?php echo 'Price'; ?>

                                            </label>
                                        </div>
                                    </div>
                                    <?php if($errors->has('cost')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('cost')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <?php echo Form::button('Update Product', array('class' => 'btn btn-success margin-bottom-1 mt-3 mb-2 btn-save','type'=>'submit')); ?>

                                </div>
                            </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_scripts'); ?>
    <?php if(config('laravelusers.tooltipsEnabled')): ?>
        <?php echo $__env->make('laravelusers::scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>