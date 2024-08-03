<?php $__env->startSection('title', 'Detalhes'); ?>
<?php $__env->startSection('conteudo'); ?>

<div class="row container"> <br>
    <div class="col s12 m6">
     <img src="<?php echo e($produto->imagem); ?>" class="responsive-img">
    </div>

    <div class="col s12 m6">
        <h4> <?php echo e($produto->nome); ?> </h4>
        <h4>R$ <?php echo e(number_format($produto->preco, 2, ',', '.')); ?> </h4>
        <p> <?php echo e($produto->descricao); ?> </p>
        <p>Postado por:  <?php echo e($produto->user->firstName); ?><br>
           Categoria: <?php echo e($produto->categoria->nome); ?> </p>

        <form action="<?php echo e(route('site.addcarrinho')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($produto->id); ?>">
            <input type="hidden" name="name" value="<?php echo e($produto->nome); ?>">
            <input type="hidden" name="price" value="<?php echo e($produto->preco); ?>">
            <input type="number" name="qnt" value="<?php echo e($produto->qnt); ?>">
            <input type="hidden" name="img" value="1">
        <button class="btn orange btn-large"> Comprar </button>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\app\cursoLaravel\resources\views/site/details.blade.php ENDPATH**/ ?>