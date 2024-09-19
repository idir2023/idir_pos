<div class="input-group d-flex justify-content-center">
    <input wire:model="unit_price.<?php echo e($cart_item->id); ?>" style="min-width: 40px;max-width: 90px;" type="text" class="form-control" min="0">
    <div class="input-group-append">
        <button @click="open<?php echo e($cart_item->id); ?> = !open<?php echo e($cart_item->id); ?>" type="button" wire:click="updatePrice('<?php echo e($cart_item->rowId); ?>', <?php echo e($cart_item->id); ?>)" class="btn btn-info">
            <i class="bi bi-check"></i>
        </button>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\idir_pos\resources\views/livewire/includes/product-cart-price.blade.php ENDPATH**/ ?>