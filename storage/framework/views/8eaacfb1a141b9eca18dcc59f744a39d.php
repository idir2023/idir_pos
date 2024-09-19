<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barcodes</title>
    <link rel="stylesheet" href="<?php echo e(public_path('b3/bootstrap.min.css')); ?>">
</head>
<body>
<div class="container">
    <div class="row">
        <?php $__currentLoopData = $barcodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barcode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xs-3" style="border: 1px solid #dddddd;border-style: dashed;">
                <p style="font-size: 15px;color: #000;margin-top: 15px;margin-bottom: 5px;">
                    <?php echo e($name); ?>

                </p>
                <div>
                    <?php echo $barcode; ?>

                </div>
                <p style="font-size: 15px;color: #000;font-weight: bold;">
                    Price:: <?php echo e(format_currency($price)); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\idir_pos\Modules/Product\Resources/views/barcode/print.blade.php ENDPATH**/ ?>