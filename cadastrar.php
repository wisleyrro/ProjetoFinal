
<?php

define('TITLE', 'Cadastrar vaga');
require_once 'vaga.php';
 
$obVaga = New Vaga();


//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    $obVaga->cadastrar();
    echo "<pre>"; print_r($bVaga); echo "</pre>"; 

    header('location:  index.php?status=success');
    exit;

}

//includes de html
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
