

<?php $__env->startSection('title', 'Edit Payment'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('sales.index')); ?>">Sales</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('sales.show', $sale)); ?>"><?php echo e($sale->reference); ?></a></li>
        <li class="breadcrumb-item active">Edit Payment</li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <form id="payment-form" action="<?php echo e(route('sale-payments.update', $salePayment)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $__env->make('utils.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="form-group">
                        <button class="btn btn-primary">Update Payment <i class="bi bi-check"></i></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="reference">Reference <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="reference" required readonly value="<?php echo e($salePayment->reference); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="date">Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="date" required value="<?php echo e($salePayment->getAttributes()['date']); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="due_amount">Due Amount <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="due_amount" required value="<?php echo e(format_currency($sale->due_amount)); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="amount">Amount <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input id="amount" type="text" class="form-control" name="amount" required value="<?php echo e(old('amount') ?? $salePayment->amount); ?>">
                                            <div class="input-group-append">
                                                <button id="getTotalAmount" class="btn btn-primary" type="button">
                                                    <i class="bi bi-check-square"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="payment_method">Payment Method <span class="text-danger">*</span></label>
                                            <select class="form-control" name="payment_method" id="payment_method" required>
                                                <option <?php echo e($salePayment->payment_method == 'Cash' ? 'selected' : ''); ?> value="Cash">Cash</option>
                                                <option <?php echo e($salePayment->payment_method == 'Credit Card' ? 'selected' : ''); ?> value="Credit Card">Credit Card</option>
                                                <option <?php echo e($salePayment->payment_method == 'Bank Transfer' ? 'selected' : ''); ?> value="Bank Transfer">Bank Transfer</option>
                                                <option <?php echo e($salePayment->payment_method == 'Cheque' ? 'selected' : ''); ?> value="Cheque">Cheque</option>
                                                <option <?php echo e($salePayment->payment_method == 'Other' ? 'selected' : ''); ?> value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="form-control" rows="4" name="note"><?php echo e(old('note') ?? $salePayment->note); ?></textarea>
                            </div>

                            <input type="hidden" value="<?php echo e($sale->id); ?>" name="sale_id">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>
    <script src="<?php echo e(asset('js/jquery-mask-money.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('#amount').maskMoney({
                prefix:'<?php echo e(settings()->currency->symbol); ?>',
                thousands:'<?php echo e(settings()->currency->thousand_separator); ?>',
                decimal:'<?php echo e(settings()->currency->decimal_separator); ?>',
            });

            $('#amount').maskMoney('mask');

            $('#getTotalAmount').click(function () {
                $('#amount').maskMoney('mask', <?php echo e($sale->due_amount); ?>);
            });

            $('#payment-form').submit(function () {
                var amount = $('#amount').maskMoney('unmasked')[0];
                $('#amount').val(amount);
            });
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\idir_pos\Modules/Sale\Resources/views/payments/edit.blade.php ENDPATH**/ ?>