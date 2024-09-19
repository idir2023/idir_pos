

<?php $__env->startSection('title', 'Edit Settings'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item active">Settings</li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php echo $__env->make('utils.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">General Settings</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('settings.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('patch'); ?>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="company_name">Company Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="company_name" value="<?php echo e($settings->company_name); ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="company_email">Company Email <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="company_email" value="<?php echo e($settings->company_email); ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="company_phone">Company Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="company_phone" value="<?php echo e($settings->company_phone); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="default_currency_id">Default Currency <span class="text-danger">*</span></label>
                                        <select name="default_currency_id" id="default_currency_id" class="form-control" required>
                                            <?php $__currentLoopData = \Modules\Currency\Entities\Currency::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($settings->default_currency_id == $currency->id ? 'selected' : ''); ?> value="<?php echo e($currency->id); ?>"><?php echo e($currency->currency_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="default_currency_position">Default Currency Position <span class="text-danger">*</span></label>
                                        <select name="default_currency_position" id="default_currency_position" class="form-control" required>
                                            <option <?php echo e($settings->default_currency_position == 'prefix' ? 'selected' : ''); ?> value="prefix">Prefix</option>
                                            <option <?php echo e($settings->default_currency_position == 'suffix' ? 'selected' : ''); ?> value="suffix">Suffix</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="notification_email">Notification Email <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="notification_email" value="<?php echo e($settings->notification_email); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="company_address">Company Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="company_address" value="<?php echo e($settings->company_address); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i> Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <?php if(session()->has('settings_smtp_message')): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            <span><?php echo e(session('settings_smtp_message')); ?></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Mail Settings</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('settings.smtp.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('patch'); ?>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="mail_mailer">MAIL_MAILER <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="mail_mailer" value="<?php echo e(env('MAIL_MAILER')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="mail_host">MAIL_HOST <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="mail_host" value="<?php echo e(env('MAIL_HOST')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="mail_port">MAIL_PORT <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="mail_port" value="<?php echo e(env('MAIL_PORT')); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="mail_mailer">MAIL_MAILER</label>
                                        <input type="text" class="form-control" name="mail_mailer" value="<?php echo e(env('MAIL_MAILER')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="mail_username">MAIL_USERNAME</label>
                                        <input type="text" class="form-control" name="mail_username" value="<?php echo e(env('MAIL_USERNAME')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="mail_password">MAIL_PASSWORD</label>
                                        <input type="password" class="form-control" name="mail_password" value="<?php echo e(env('MAIL_PASSWORD')); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="mail_encryption">MAIL_ENCRYPTION</label>
                                        <input type="text" class="form-control" name="mail_encryption" value="<?php echo e(env('MAIL_ENCRYPTION')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="mail_from_address">MAIL_FROM_ADDRESS</label>
                                        <input type="email" class="form-control" name="mail_from_address" value="<?php echo e(env('MAIL_FROM_ADDRESS')); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="mail_from_name">MAIL_FROM_NAME <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="mail_from_name" value="<?php echo e(env('MAIL_FROM_NAME')); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i> Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\important files\triangle-pos\Modules/Setting\Resources/views/index.blade.php ENDPATH**/ ?>