<div>
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
        <div class="table-responsive position-relative">
            <div wire:loading.flex class="col-12 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th class="align-middle">Product</th>
                    <th class="align-middle text-center">Net Unit Price</th>
                    <th class="align-middle text-center">Stock</th>
                    <th class="align-middle text-center">Quantity</th>
                    <th class="align-middle text-center">Discount</th>
                    <th class="align-middle text-center">Tax</th>
                    <th class="align-middle text-center">Sub Total</th>
                    <th class="align-middle text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php if($cart_items->isNotEmpty()): ?>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="align-middle">
                                    <?php echo e($cart_item->name); ?> <br>
                                    <span class="badge badge-success">
                                        <?php echo e($cart_item->options->code); ?>

                                    </span>
                                    <?php echo $__env->make('livewire.includes.product-cart-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>

                                <td x-data="{ open<?php echo e($cart_item->id); ?>: false }" class="align-middle text-center">
                                    <span x-show="!open<?php echo e($cart_item->id); ?>" @click="open<?php echo e($cart_item->id); ?> = !open<?php echo e($cart_item->id); ?>"><?php echo e(format_currency($cart_item->price)); ?></span>

                                    <div x-show="open<?php echo e($cart_item->id); ?>">
                                        <?php echo $__env->make('livewire.includes.product-cart-price', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </td>

                                <td class="align-middle text-center text-center">
                                    <span class="badge badge-info"><?php echo e($cart_item->options->stock . ' ' . $cart_item->options->unit); ?></span>
                                </td>

                                <td class="align-middle text-center">
                                    <?php echo $__env->make('livewire.includes.product-cart-quantity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>

                                <td class="align-middle text-center">
                                    <?php echo e(format_currency($cart_item->options->product_discount)); ?>

                                </td>

                                <td class="align-middle text-center">
                                    <?php echo e(format_currency($cart_item->options->product_tax)); ?>

                                </td>

                                <td class="align-middle text-center">
                                    <?php echo e(format_currency($cart_item->options->sub_total)); ?>

                                </td>

                                <td class="align-middle text-center">
                                    <a href="#" wire:click.prevent="removeItem('<?php echo e($cart_item->rowId); ?>')">
                                        <i class="bi bi-x-circle font-2xl text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">
                        <span class="text-danger">
                            Please search & select products!
                        </span>
                            </td>
                        </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
    </div>

    <div class="row justify-content-md-end">
        <div class="col-md-4">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Tax (<?php echo e($global_tax); ?>%)</th>
                        <td>(+) <?php echo e(format_currency(Cart::instance($cart_instance)->tax())); ?></td>
                    </tr>
                    <tr>
                        <th>Discount (<?php echo e($global_discount); ?>%)</th>
                        <td>(-) <?php echo e(format_currency(Cart::instance($cart_instance)->discount())); ?></td>
                    </tr>
                    <tr>
                        <th>Shipping</th>
                        <input type="hidden" value="<?php echo e($shipping); ?>" name="shipping_amount">
                        <td>(+) <?php echo e(format_currency($shipping)); ?></td>
                    </tr>
                    <tr>
                        <th>Grand Total</th>
                        <?php
                            $total_with_shipping = Cart::instance($cart_instance)->total() + (float) $shipping
                        ?>
                        <th>
                            (=) <?php echo e(format_currency($total_with_shipping)); ?>

                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <input type="hidden" name="total_amount" value="<?php echo e($total_with_shipping); ?>">

    <div class="form-row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="tax_percentage">Tax (%)</label>
                <input wire:model.blur="global_tax" type="number" class="form-control" name="tax_percentage" min="0" max="100" value="<?php echo e($global_tax); ?>" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="discount_percentage">Discount (%)</label>
                <input wire:model.blur="global_discount" type="number" class="form-control" name="discount_percentage" min="0" max="100" value="<?php echo e($global_discount); ?>" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="shipping_amount">Shipping</label>
                <input wire:model.blur="shipping" type="number" class="form-control" name="shipping_amount" min="0" value="0" required step="0.01">
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\lenovo\Desktop\important files\idir_pos\resources\views/livewire/product-cart.blade.php ENDPATH**/ ?>