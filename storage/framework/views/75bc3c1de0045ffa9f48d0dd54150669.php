<div>
    <div class="card border-0 shadow-sm mt-3">
        <div class="card-body">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pos.filter', ['categories' => $categories]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2566726058-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <div class="row position-relative">
                <div wire:loading.flex class="col-12 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div wire:click.prevent="selectProduct(<?php echo e($product); ?>)" class="col-lg-4 col-md-6 col-xl-3" style="cursor: pointer;">
                        <div class="card border-0 shadow h-100">
                            <div class="position-relative">
                                <img height="200" src="<?php echo e($product->getFirstMediaUrl('images')); ?>" class="card-img-top" alt="Product Image">
                                <div class="badge badge-info mb-3 position-absolute" style="left:10px;top: 10px;">Stock: <?php echo e($product->product_quantity); ?></div>
                            </div>
                            <div class="card-body">
                                <div class="mb-2">
                                    <h6 style="font-size: 13px;" class="card-title mb-0"><?php echo e($product->product_name); ?></h6>
                                    <span class="badge badge-success">
                                    <?php echo e($product->product_code); ?>

                                </span>
                                </div>
                                <p class="card-text font-weight-bold"><?php echo e(format_currency($product->product_price)); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12">
                        <div class="alert alert-warning mb-0">
                            Products Not Found...
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['mt-3' => $products->hasPages()]); ?>">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\idir_pos\resources\views/livewire/pos/product-list.blade.php ENDPATH**/ ?>