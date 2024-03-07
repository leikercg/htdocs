<?php $__env->startSection("title", "Departamento de compras"); ?>

<?php $__env->startSection("header", "Departamento de compras"); ?>

<?php $__env->startSection("main_title", "Productos por proveedor"); ?>

<?php $__env->startSection("content"); ?>
    <table class='sinbordes'>
        <tr>
            <th>Proveedor</th><th>Contacto</th><th>Productos</th>
        </tr>
    <?php $__currentLoopData = $supplierList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <ul class="sinpuntos">
                    <li><b><?php echo e($supplier->name); ?></b></li>
                    <li><?php echo e($supplier->address); ?></li>
                    <li><?php echo e($supplier->city); ?>, <?php echo e($supplier->country); ?></li>
                </ul>
            </td>
            <td>
                <ul class="sinpuntos">
                    <li><b><?php echo e($supplier->contact->name); ?> <?php echo e($supplier->contact->surname); ?></b></li>
                    <li><?php echo e($supplier->contact->email); ?></li>
                    <li><?php echo e($supplier->contact->phone_number); ?></li>
                </ul>
            </td>
            <td>
                <ul>
                    <?php $__currentLoopData = $supplier->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($product->name); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <br><br>
    <form action = "<?php echo e(route('menu')); ?>" method="GET" class="centrado">
        <?php echo csrf_field(); ?>
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Leiker_Castillo\xampp\htdocs\Laravel\repaso\resources\views/supplier/products.blade.php ENDPATH**/ ?>