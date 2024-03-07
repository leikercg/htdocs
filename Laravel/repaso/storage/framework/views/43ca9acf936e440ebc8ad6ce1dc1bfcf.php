<?php $__env->startSection('title', 'Administración de productos'); ?>

<?php $__env->startSection('header', 'Administración de productos'); ?>

<?php $__env->startSection('main_title', 'Insertar/modificar producto'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(isset($product)): ?>
        <br><br>
        <form action="<?php echo e(route('product.update', ['product' => $product->id])); ?>" method="POST">
            <?php echo method_field('PATCH'); ?>
    <?php else: ?>
        <form action="<?php echo e(route('product.store')); ?>" method="POST">
    <?php endif; ?>
            <?php echo csrf_field(); ?>
            <br>
            <table class='sinbordes'>
                <tr>
                    <td class='sinbordes'>Nombre del producto:</td>
                    <td class='sinbordes'><input type="text" name="name" value="<?php echo e($product->name ?? ''); ?>" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Descripción:</td>
                    <td class='sinbordes'><input type="text" name="description" value="<?php echo e($product->description ?? ''); ?>" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Precio:</td>
                    <td class='sinbordes'><input type="text" name="price" value="<?php echo e($product->price ?? ''); ?>" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Stock:</td>
                    <td class='sinbordes'><input type="text" name="stock" value="<?php echo e($product->stock ?? ''); ?>" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Proveedor:</td>
                    <td class='sinbordes'>
                        <select name="supplier_id">
                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($supplier->id); ?>"
                                    <?php if( $supplier->id == ($product->supplier_id ?? "")): ?>
                                        selected
                                    <?php endif; ?>
                                ><?php echo e($supplier->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class='sinbordes'><a href="<?php echo e(route('product.index')); ?>">Volver al listado</a></td>
                    <td class='sinbordes'><input type="submit"></td>
                </tr>
            </table>
        </form>

        <br><br>
        <form action = "<?php echo e(route('menu')); ?>" method="GET" class="centrado">
            <?php echo csrf_field(); ?>
            <input type="submit" value="MENÚ PRINCIPAL">
        </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Leiker_Castillo\xampp\htdocs\Laravel\repaso\resources\views/product/form.blade.php ENDPATH**/ ?>