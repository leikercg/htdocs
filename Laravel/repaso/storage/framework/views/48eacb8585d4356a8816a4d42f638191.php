<?php $__env->startSection("title", "Administración de productos"); ?>

<?php $__env->startSection("header", "Administración de productos"); ?>

<?php $__env->startSection("main_title", "Listado de empleados"); ?>

<?php $__env->startSection("content"); ?>
    <table class='sinbordes'>
        <tr>
            <th>Nombre</th><th>Apellidos</th><th>Departamento</th><th>Funciones</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>
    <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="hover"><?php echo e($empleado->name); ?></td>
            <td><?php echo e($empleado->surname); ?></td>
            <td ><?php echo e($empleado->department); ?></td>
            <td ><?php echo e($empleado->functions); ?></td>
            <td class='sinbordes centrado'>
                <a href="<?php echo e(route('modificarEmpleado',['employee'=>$empleado->id])); ?>">Modificar</a>
            </td>
            <td class='sinbordes'>
                <form action = "<?php echo e(route('eliminarEmpleado', $empleado->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("DELETE"); ?>
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table><br>


    <br><br>
    <form action = "<?php echo e(route('menu')); ?>" method="GET" class="centrado">
        <?php echo csrf_field(); ?>
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Leiker_Castillo\xampp\htdocs\Laravel\repaso\resources\views/employee/employees.blade.php ENDPATH**/ ?>