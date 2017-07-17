<?php $__env->startSection('content'); ?>
  <p>
  <div class="table-responsive">
    <table ID= "alter" class=" tabbe table-striped table-bordered table-hover">
      <tr>
        <td>Nome    </td>
        <td>Matricula    </td>
        <td>Nota    </td>
        <td>Orientador   </td>
        </tr>
      <h1>Listagem de Usuarios</h1>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td><?php echo e($r->nome); ?></td>
        <td><?= $r->matricula ?> </td>
        <td><?= $r->email ?> </td>
        <td> <a href="/edit_u/<?= $r->id ?>">Editar</a></td>
        <td><a href="<?php echo e(action('TesteController@remove_u', $r->id)); ?>"> Remover</a></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>