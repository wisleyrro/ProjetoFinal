
<?php


require_once 'vaga.php';
 //CONSULTA A VAGA
$obVaga = New Vaga();

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=success');
    exit;
}

$obVaga = Vaga::getVaga($_GET['id']);
//VALIDAÇÃO DA VAGA
if(!$obVaga instanceof Vaga){
    header('location: index.php?status=success');
    exit;
}

//echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

    $obVaga->excluir();

    header('location: index.php?status=success');
    exit;
}

//includes de html
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';
