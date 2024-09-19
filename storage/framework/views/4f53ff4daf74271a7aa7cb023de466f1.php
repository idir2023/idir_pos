<div class="btn-group dropleft">
    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots-vertical"></i>
    </button>
    <div class="dropdown-menu">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_quotation_sales')): ?>
            <a href="<?php echo e(route('quotation-sales.create', $data)); ?>" class="dropdown-item">
                <i class="bi bi-check2-circle mr-2 text-success" style="line-height: 1;"></i> Make Sale
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send_quotation_mails')): ?>
            <a href="<?php echo e(route('quotation.email', $data)); ?>" class="dropdown-item">
                <i class="bi bi-cursor mr-2 text-warning" style="line-height: 1;"></i> Send On Email
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_quotations')): ?>
            <a href="<?php echo e(route('quotations.edit', $data->id)); ?>" class="dropdown-item">
                <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> Edit
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_quotations')): ?>
            <a href="<?php echo e(route('quotations.show', $data->id)); ?>" class="dropdown-item">
                <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Details
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_quotations')): ?>
            <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Are you sure? It will delete the data permanently!')) {
                document.getElementById('destroy<?php echo e($data->id); ?>').submit()
                }">
                <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                <form id="destroy<?php echo e($data->id); ?>" class="d-none" action="<?php echo e(route('quotations.destroy', $data->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                </form>
            </button>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\idir_pos\Modules/Quotation\Resources/views/partials/actions.blade.php ENDPATH**/ ?>