<?php $__env->startSection('content'); ?>
  <p>
  <h1> Cadastro Bolsa </h1>
  <form action = "/adiciona_b" method = "post">

    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

    <div class="form-group">
      <label>Nome </label>
      <input name="nome" required="requiored" class="form-control"/>
    </div>


    <div class="form-group">
      <label>Duração </label>
      <input name="duracao" type="number" required="requiored" class="form-control"/>
    </div>

    <button type="submit">Enviar</button>

  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>