<?php $__env->startSection('content'); ?>
  <p>
    <?php if(old("nome")): ?>
      <div class="alert alert-success">
        <strong>Sucesso!</strong>O aluno <?php echo e(old("nome")); ?> foi adicionado.</div>
    <?php endif; ?>
  <div class="table-responsive">
    <table ID= "alter" class=" tabbe table-striped table-bordered table-hover">
      <tr>
        <td>Nome    </td>
        <td>Matricula    </td>
        <td>Nota    </td>
        <td>Orientador   </td>
        </tr>
      <h1>Listagem de Alunos</h1>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td><?php echo e($r->nome); ?></td>
        <td><?= $r->matricula ?> </td>
        <td><?= $r->nota ?> </td>
        <td><?= $r->orientador ?> </td>
        <td> <a href="/edita/<?= $r->id ?>">Editar</a></td>
        <td><a href="<?php echo e(action('TesteController@remove', $r->id)); ?>"> Remover</a></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>