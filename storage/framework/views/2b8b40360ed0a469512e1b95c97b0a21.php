<?php $__env->startSection('title', 'HOME'); ?>
<?php $__env->startSection('conteudo'); ?>

<div class="row container">

    <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
              <img src="<?php echo e($produto->imagem); ?>">
              <a href="<?php echo e(route('site.details', $produto->slug)); ?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
            </div>
            <div class="card-content">
              <span class="card-title"><?php echo e($produto->nome); ?></span>
              <p><?php echo e($produto->descricao); ?></p>
            </div>
          </div>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row center">
    <?php echo e($produtos->links('custom.pagination')); ?>

</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\app\cursoLaravel\resources\views/site/home.blade.php ENDPATH**/ ?>