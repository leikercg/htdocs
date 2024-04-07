<?php $__env->startSection("title", "Administración de contactos"); ?>

<?php $__env->startSection("header", "Administración de contactos"); ?>

<?php $__env->startSection("main_title", "Listado de contactos"); ?>

<?php $__env->startSection("content"); ?>
    <table class='sinbordes'>
        <tr>
            <th>Nombre</th><th>Apellidos</th><th>Correo electrónico</th><th>Teléfono</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>
    <?php $__currentLoopData = $contactList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($contact->name); ?></td>
            <td><?php echo e($contact->surname); ?></td>
            <td><?php echo e($contact->email); ?></td>
            <td class='derecha'><?php echo e($contact->phone_number); ?></td>
            <td class='sinbordes centrado'>
                <a href="<?php echo e(route('contact.edit', $contact->id)); ?>">Modificar</a>
            </td>
            <td class='sinbordes'>
                <form action = "<?php echo e(route('contact.destroy', $contact->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("DELETE"); ?>
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
        <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table><br>
    <a href="<?php echo e(route('contact.create')); ?>">Nuevo contacto</a>
    <br><br>
    <form action = "<?php echo e(route('menu')); ?>" method="GET" class="centrado">
        <?php echo csrf_field(); ?>
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Leiker_Castillo\xampp\htdocs\Laravel\repaso\resources\views/contact/all.blade.php ENDPATH**/ ?>