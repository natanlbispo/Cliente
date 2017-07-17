<?php $__env->startSection('content'); ?>
  <p>
  <h1> Cadastro Usuario </h1>
  <form action = "/adiciona_u" method = "post">

    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

    <div class="form-group">
      <label>Nome </label>
      <input name="nome" required="requiored" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Matrícula </label>
      <input name="matricula" type="number" required="requiored" pattern="[0-9]+$" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Email </label>
      <input name="email" type="email" required="requiored" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Senha </label>
      <input name="senha" type="password" required="requiored" class="form-control"/>
    </div>

    <button type="submit">Enviar</button>

  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>