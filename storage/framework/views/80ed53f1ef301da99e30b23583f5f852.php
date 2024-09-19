<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_sale_payments')): ?>
    <a href="<?php echo e(route('sale-payments.edit', [$data->sale->id, $data->id])); ?>" class="btn btn-info btn-sm">
        <i class="bi bi-pencil"></i>
    </a>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_sale_payments')): ?>
    <button id="delete" class="btn btn-danger btn-sm" onclick="
        event.preventDefault();
        if (confirm('Are you sure? It will delete the data permanently!')) {
        document.getElementById('destroy<?php echo e($data->id); ?>').submit()
        }
        ">
        <i class="bi bi-trash"></i>
        <form id="destroy<?php echo e($data->id); ?>" class="d-none" action="<?php echo e(route('sale-payments.destroy', $data->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
        </form>
    </button>
<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Desktop\important files\triangle-pos\Modules/Sale\Resources/views/payments/partials/actions.blade.php ENDPATH**/ ?>