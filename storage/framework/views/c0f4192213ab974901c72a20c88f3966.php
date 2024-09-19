<div>
    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <div class="alert-body">
                <span><?php echo e(session('message')); ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table table-bordered mb-0">
                    <thead>
                    <tr class="align-middle">
                        <th class="align-middle">Product Name</th>
                        <th class="align-middle">Code</th>
                        <th class="align-middle">
                            Quantity <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Quantity: 100"></i>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <!--[if BLOCK]><![endif]--><?php if(!empty($product)): ?>
                            <td class="align-middle"><?php echo e($product->product_name); ?></td>
                            <td class="align-middle"><?php echo e($product->product_code); ?></td>
                            <td class="align-middle text-center" style="width: 200px;">
                                <input wire:model.live="quantity" class="form-control" type="number" min="1" max="100" value="<?php echo e($quantity); ?>">
                            </td>
                        <?php else: ?>
                            <td colspan="3" class="text-center">
                                <span class="text-danger">Please search & select a product!</span>
                            </td>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <button wire:click="generateBarcodes(<?php echo e($product); ?>, <?php echo e($quantity); ?>)" type="button" class="btn btn-primary">
                    <i class="bi bi-upc-scan"></i> Generate Barcodes
                </button>
            </div>
        </div>
    </div>

    <div wire:loading wire:target="generateBarcodes" class="w-100">
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(!empty($barcodes)): ?>
        <div class="text-right mb-3">
            <button wire:click="getPdf" wire:loading.attr="disabled" type="button" class="btn btn-primary">
                <span wire:loading wire:target="getPdf" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <i wire:loading.remove wire:target="getPdf" class="bi bi-file-earmark-pdf"></i> Download PDF
            </button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $barcodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barcode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6" style="border: 1px solid #ffffff;border-style: dashed;background-color: #48FCFE;">
                            <p class="mt-3 mb-1" style="font-size: 15px;color: #000;">
                                <?php echo e($product->product_name); ?>

                            </p>
                            <div>
                                <?php echo $barcode; ?>

                            </div>
                            <p style="font-size: 15px;color: #000;">
                                Price:: <?php echo e(format_currency($product->product_price)); ?>

                            </p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\Users\lenovo\Desktop\important files\triangle-pos\resources\views/livewire/barcode/product-table.blade.php ENDPATH**/ ?>