<?php
$host = 'localhost';
$user = 'root';
$senha = '';
$db = 'controle_estoque';

$mysqli = new mysqli($host, $user, $senha, $db);
if ($mysqli->connect_errno) {
    die('Falha ao conectar ao banco de dados: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');
?>
