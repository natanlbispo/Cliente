<?php $__env->startSection('content'); ?>
<p>
<h1>Alterar produto <?php echo e($r->nome); ?></h1>

<form action="editadoa/<?php echo e($r->id); ?>" method="post">

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
    <label>Nota </label>
    <input name="nota"  type="number" required="requiored" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Data Entrada </label>
    <input name="data" type="date" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Orientador </label>
    <input name="orientador" required="requiored" class="form-control"/>
  </div>
	<button type="submit" class="btn btn-primary btn-block">Registrar</button>
</form>
  <br>
<a href="/lalunos "> <button class="btn btn-primary btn-block">Cancelar</button> </a>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>