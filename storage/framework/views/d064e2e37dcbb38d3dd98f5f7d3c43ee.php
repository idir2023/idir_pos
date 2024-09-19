

<?php $__env->startSection('title', 'Create Customer'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('currencies.index')); ?>">Currencies</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <form action="<?php echo e(route('currencies.update', $currency)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $__env->make('utils.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="form-group">
                        <button class="btn btn-primary">Update Currency <i class="bi bi-check"></i></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="currency_name">Currency Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="currency_name" required value="<?php echo e($currency->currency_name); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="code">Currency Code <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="code" required value="<?php echo e($currency->code); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="symbol">Symbol <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="symbol" required value="<?php echo e($currency->symbol); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="thousand_separator">Thousand Separator <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="thousand_separator" required value="<?php echo e($currency->thousand_separator); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="decimal_separator">Decimal Separator <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="decimal_separator" required value="<?php echo e($currency->decimal_separator); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\important files\triangle-pos\Modules/Currency\Resources/views/edit.blade.php ENDPATH**/ ?>