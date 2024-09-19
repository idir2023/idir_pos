<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">
                    <i class="bi bi-cart-check text-primary"></i> Confirm Sale
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="checkout-form" action="<?php echo e(route('app.pos.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <!--[if BLOCK]><![endif]--><?php if(session()->has('checkout_message')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <span><?php echo e(session('checkout_message')); ?></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <div class="row">
                        <div class="col-lg-7">
                            <input type="hidden" value="<?php echo e($customer_id); ?>" name="customer_id">
                            <input type="hidden" value="<?php echo e($global_tax); ?>" name="tax_percentage">
                            <input type="hidden" value="<?php echo e($global_discount); ?>" name="discount_percentage">
                            <input type="hidden" value="<?php echo e($shipping); ?>" name="shipping_amount">
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="total_amount">Total Amount <span class="text-danger">*</span></label>
                                        <input id="total_amount" type="text" class="form-control" name="total_amount" value="<?php echo e($total_amount); ?>" readonly required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="paid_amount">Received Amount <span class="text-danger">*</span></label>
                                        <input id="paid_amount" type="text" class="form-control" name="paid_amount" value="<?php echo e($total_amount); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="payment_method">Payment Method <span class="text-danger">*</span></label>
                                <select class="form-control" name="payment_method" id="payment_method" required>
                                    <option value="Cash">Cash</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="note">Note (If Needed)</label>
                                <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Total Products</th>
                                        <td>
                                                <span class="badge badge-success">
                                                    <?php echo e(Cart::instance($cart_instance)->count()); ?>

                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Order Tax (<?php echo e($global_tax); ?>%)</th>
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
                                    <tr class="text-primary">
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\idir_pos\resources\views/livewire/pos/includes/checkout-modal.blade.php ENDPATH**/ ?>