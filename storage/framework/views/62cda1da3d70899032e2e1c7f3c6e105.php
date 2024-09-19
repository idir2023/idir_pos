

<?php $__env->startSection('title', 'Adjustment Details'); ?>

<?php $__env->startPush('page_css'); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('adjustments.index')); ?>">Adjustments</a></li>
        <li class="breadcrumb-item active">Details</li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2">
                                        Date
                                    </th>
                                    <th colspan="2">
                                        Reference
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php echo e($adjustment->date); ?>

                                    </td>
                                    <td colspan="2">
                                        <?php echo e($adjustment->reference); ?>

                                    </td>
                                </tr>

                                <tr>
                                    <th>Product Name</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>Type</th>
                                </tr>

                                <?php $__currentLoopData = $adjustment->adjustedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adjustedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($adjustedProduct->product->product_name); ?></td>
                                        <td><?php echo e($adjustedProduct->product->product_code); ?></td>
                                        <td><?php echo e($adjustedProduct->quantity); ?></td>
                                        <td>
                                            <?php if($adjustedProduct->type == 'add'): ?>
                                                (+) Addition
                                            <?php else: ?>
                                                (-) Subtraction
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\important files\idir_pos\Modules/Adjustment\Resources/views/show.blade.php ENDPATH**/ ?>