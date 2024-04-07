<!DOCTYPE HTML>
<html lang="es-ES">
<head>
        <meta charset="utf-8" />
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('../css/estilos.css')); ?>">
</head>
<body>
    <header>
        <h1>
            <?php echo $__env->yieldContent('header'); ?>
        </h1>
    </header>
    <section>
        <nav>
            <?php echo $__env->yieldContent('nav'); ?>
        </nav>
        <main>
            <h1 class='centrado'><?php echo $__env->yieldContent('main_title'); ?></h1><br>
            <?php $__env->startSection('content'); ?>
            <?php echo $__env->yieldSection(); ?>
        </main>
		<aside>
            <?php echo $__env->yieldContent('aside'); ?>
        </aside>
	</section>
	<footer>
        <?php echo $__env->yieldContent('footer'); ?>
    </footer>
</body>
</html><?php /**PATH D:\Leiker_Castillo\xampp\htdocs\Laravel\repaso\resources\views/master.blade.php ENDPATH**/ ?>