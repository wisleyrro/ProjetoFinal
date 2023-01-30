<?php

require_once 'vaga.php';

$vagas = Vaga::getVagas();

//PARTE HEADER HTML
include __DIR__ . '/includes/header.php';

//PARTE lISTAGEM HTML
include __DIR__ . '/includes/listagem.php';
//PARTE FOOTER HTML
include __DIR__ . '/includes/footer.php';

