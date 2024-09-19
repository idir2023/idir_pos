<?php if($data->status == 'Pending'): ?>
    <span class="badge badge-info">
        <?php echo e($data->status); ?>

    </span>
<?php else: ?>
    <span class="badge badge-success">
        <?php echo e($data->status); ?>

    </span>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\idir_pos\Modules/Quotation\Resources/views/partials/status.blade.php ENDPATH**/ ?>