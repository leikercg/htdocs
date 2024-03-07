<?php $__env->startSection("title", "Administración de productos"); ?>

<?php $__env->startSection("header", "Administración de productos"); ?>

<?php $__env->startSection("main_title", "Listado de productos"); ?>

<?php $__env->startSection("content"); ?>
    <table class='sinbordes'>
        <tr>
            <th>Producto</th><th>Descripción</th><th>Precio</th><th>Stock</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>
    <?php $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="hover"><a href="<?php echo e(route('product.show', $product->id)); ?>" class="block"><?php echo e($product->name); ?></a></td>
            <td><?php echo e($product->description); ?></td>
            <td class='derecha'><?php echo e($product->price); ?></td>
            <td class='derecha'><?php echo e($product->stock); ?></td>
            <td class='sinbordes centrado'>
                <a href="<?php echo e(route('product.edit', $product->id)); ?>">Modificar</a>
            </td>
            <td class='sinbordes'>
                <form action = "<?php echo e(route('product.destroy', $product->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("DELETE"); ?>
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table><br>
    <a href="<?php echo e(route('product.create')); ?>">Nuevo artículo</a>

    <br><br>
    <form action = "<?php echo e(route('menu')); ?>" method="GET" class="centrado">
        <?php echo csrf_field(); ?>
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Leiker_Castillo\xampp\htdocs\Laravel\repaso\resources\views/product/all.blade.php ENDPATH**/ ?>