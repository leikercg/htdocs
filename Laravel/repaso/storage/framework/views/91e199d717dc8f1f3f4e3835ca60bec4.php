<?php $__env->startSection("title", "Gestión de empresa"); ?>

<?php $__env->startSection("header", "Gestión de empresa"); ?>

<?php $__env->startSection("main_title", "Registros de la base de datos"); ?>

<?php $__env->startSection("content"); ?>
    <form action = "<?php echo e(route('product.index')); ?>" method="GET" class="centrado">
        <?php echo csrf_field(); ?>
        <input type="submit" value="Productos en stock" class="grande">
    </form>

    <form action = "<?php echo e(route('supplier.index')); ?>" method="GET" class="centrado">
        <?php echo csrf_field(); ?>
        <input type="submit" value="Proveedores" class="grande">
    </form>

    <form action = "<?php echo e(route('contact.index')); ?>" method="GET" class="centrado">
        <?php echo csrf_field(); ?>
        <input type="submit" value="Contactos" class="grande">
    </form>

    <form action = "<?php echo e(route('supplier.products')); ?>" method="GET" class="centrado">
        <?php echo csrf_field(); ?>
        <input type="submit" value="Productos por proveedor" class="grande">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Leiker_Castillo\xampp\htdocs\Laravel\repaso\resources\views/index.blade.php ENDPATH**/ ?>