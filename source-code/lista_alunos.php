<?php

require_once ('db.class.php');

$database = new db();
$link = $database->conecta_mysql();

$sql = "SELECT * FROM alunos";

$result = mysqli_query($link, $sql);
echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nome</th>";
echo "<th>Matricula</th>";
echo "<th>Nota</th>";
echo "<th>Nota P</th>";
echo "<th>Data Entrada</th>";
echo "<th>Orientador</th>";
echo "</tr>";

if (isset($result) && !empty($result)) {
    foreach ($result as $value) {
        echo "<tr>";
        echo "<td>".$value['id']."</td>";
        echo "<td>".$value['nome']."</td>";
        echo "<td>".$value['matricula']."</td>";
        echo "<td>".$value['nota']."</td>";
        echo "<td>".$value['notap']."</td>";
        echo "<td>".$value['data_entrada']."</td>";
        echo "<td>".$value['orientador']."</td>";
        echo "</tr>";
    }
}

echo "</table>";
?>