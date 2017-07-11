<html>
  <body>
    <h1>Listagem de Alunos</h1>
    <table>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td><?= $r->Nome ?> </td>
        <td><?= $r->matricula ?> </td>
        <td><?= $r->email ?> </td>
        <td><?= $r->tipo ?> </td>
        <td> <a href="/telas/editc">Editar</a></td>
        <td> <a href="/telas/editc">Tornar Adm</a></td>
      </tr>
      <?php endforeach ?>
    </table>
  </body>
</html>
