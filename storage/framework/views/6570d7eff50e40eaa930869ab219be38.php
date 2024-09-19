<div>
    <div class="form-row">
        <div class="col-md-7">
            <div class="form-group">
                <label>Product Category</label>
                <select wire:model.live="category" class="form-control">
                    <option value="">All Products</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label>Product Count</label>
                <select wire:model.live="showCount" class="form-control">
                    <option value="9">9 Products</option>
                    <option value="15">15 Products</option>
                    <option value="21">21 Products</option>
                    <option value="30">30 Products</option>
                    <option value="">All Products</option>
                </select>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\idir_pos\resources\views/livewire/pos/filter.blade.php ENDPATH**/ ?>