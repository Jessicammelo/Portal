<?php
require "../classes/bancoDados.php";
$db = new BancoDados();
$conexao = $db->instancia();
$stmt = $conexao->query('SELECT * FROM instituicao');
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$nomes = [];
for($i=0;$i<count($data);$i++){
 $nomes[] = $data[$i]["nome"];
}
print_r($nomes);