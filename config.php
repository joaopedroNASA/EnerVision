<?php

//configurações básicas

$host = 'localhost';
$dbname = 'enervision';
$username = 'root';
$password = '';

/*
$host = 'sql301.infinityfree.com';
$dbname = 'if0_38366413_enervision  ';
$username = 'if0_38366413';
$password = '41qDWUfckEe';
*/
//CONEXÃO PDO
try{
    $pdo = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    die("Erro ao conectar:" . $e->getMessage());
}
?>