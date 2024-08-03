<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

    <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    <?php $__currentLoopData = $categoriasMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoriaM): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><a href="<?php echo e(route('site.categoria', $categoriaM->id)); ?>"><?php echo e($categoriaM->nome); ?></a></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>

    <nav class="red">
        <div class="nav-wrapper container">
          <a href="#" class="brand-logo center">Loja MD</a>
          <ul id="nav-mobile" class="left">
            <li><a href="<?php echo e(route('site.index')); ?>">Home</a></li>
            <li><a href="#" class="dropdown-trigger" data-target='dropdown1'>Categorias <i class="material-icons right">expand_more</i></a></li>
            <li><a href="<?php echo e(route('site.carrinho')); ?>">Carrinho <span class="new badge blue" data-badge-caption=""><?php echo e(Cart::count()); ?></span></a></li>
          </ul>
        </div>
      </nav>

<?php echo $__env->yieldContent('conteudo'); ?>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
    var elemDrop = document.querySelectorAll('.dropdown-trigger');
    var instanceDrop = M.Dropdown.init(elemDrop, {
        coverTrigger: false,
        constrainWidth: false
    });
</script>

</body>
</html>
<?php /**PATH C:\Projetos\app\cursoLaravel\resources\views/site/layout.blade.php ENDPATH**/ ?>