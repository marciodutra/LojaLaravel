<?php $__env->startSection('title', 'Carrinho'); ?>
<?php $__env->startSection('conteudo'); ?>

<div class="row container">

    <?php if($mensagem = Session::get('sucesso')): ?>


    <div class="card green">
        <div class="card-content white-text">
          <span class="card-title">Parabéns!</span>
          <p><?php echo e($mensagem); ?></p>
        </div>
      </div>
    <?php endif; ?>

    <h5>Seu carrinho possui <?php echo e($itens->count()); ?> produtos. </h5>

    <table class="striped">
        <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
        <?php $__currentLoopData = $itens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><img src="<?php echo e($item->image); ?>" alt="" width="70" class="responsive-img circle"></td>
            <td><?php echo e($item->name); ?></td>
            <td>R$ <?php echo e(number_format($item->price, 2, ',', '.')); ?></td>
            <td><input style="width: 40px; font-weight:900;" class="white center" type="number" name="quantity" value="<?php echo e($item->quantity); ?>"></td>
            <td>
                <button class="btn-floating  waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                <button class="btn-floating  waves-effect waves-light red"><i class="material-icons">delete</i></button>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>

      <div class="row container center">
        <button class="btn  waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i></button>
        <button class="btn  waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></button>
        <button class="btn  waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i></button>
      </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\app\cursoLaravel\resources\views/site/carrinho.blade.php ENDPATH**/ ?>