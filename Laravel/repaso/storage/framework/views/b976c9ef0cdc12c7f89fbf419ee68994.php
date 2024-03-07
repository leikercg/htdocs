<?php $__env->startSection("title", "Administración de productos"); ?>

<?php $__env->startSection("header", "Administración de productos"); ?>

<?php $__env->startSection("main_title", "Detalle de producto"); ?>

<?php $__env->startSection("content"); ?>
    <table class='sinbordes'>
        <tr>
            <th class='sinbordes derecha mitad'>Producto:</th>
            <td class='sinbordes mitad'><?php echo e($product->name); ?></td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Precio:</th>
            <td class='sinbordes mitad'><?php echo e($product->price); ?></td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Cantidad en stock:</th>
            <td class='sinbordes mitad'><?php echo e($product->stock); ?></td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Proveedor:</th>
            <td class='sinbordes mitad'><?php echo e($supplier->name); ?></td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Contacto:</th>
            <td class='sinbordes mitad'><?php echo e($supplier->contact->name); ?></td>
        </tr>
        <tr>
            <th class='sinbordes derecha mitad'>Teléfono:</th>
            <td class='sinbordes mitad'><?php echo e($supplier->contact->phone_number); ?></td>
        </tr>
    </table>

    <br><br>
    <a href="<?php echo e(route('product.index')); ?>" class='centrado'>Volver al listado</a>

    <br><br>
    <form action = "<?php echo e(route('menu')); ?>" method="GET" class="centrado">
        <?php echo csrf_field(); ?>
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Leiker_Castillo\xampp\htdocs\Laravel\repaso\resources\views/product/show.blade.php ENDPATH**/ ?>