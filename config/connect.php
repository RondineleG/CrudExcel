<?php

   // settings connection
   $serverName = 'den1.mysql5.gear.host';
   $userName = 'bugs';
   $password = 'Fv8r3Fo6-3-v';
   $dbName = 'bugs';

   // Creating connection
   $connection = new mysqli($serverName, $userName, $password, $dbName);


//Verificar se esta sendo passado na URL a p�gina atual, sen�o � atribuido a pagina
$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

//Selecionar todos os itens da tabela
$result_msg_contato = "SELECT * FROM bugs.mensagens_contatos";
$resultado_msg_contato = mysqli_query($connection , $result_msg_contato);

//Contar o total de itens
$total_msg_contatos = mysqli_num_rows($resultado_msg_contato);

//Seta a quantidade de itens por p�gina
$quantidade_pg = 20;

//calcular o n�mero de p�ginas
$num_pagina = ceil($total_msg_contatos/$quantidade_pg);

//calcular o inicio da visualizao
$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar  os itens da p�gina
$result_msg_contatos = "SELECT * FROM bugs.mensagens_contatos limit $inicio, $quantidade_pg";
$resultado_msg_contatos = mysqli_query($connection , $result_msg_contatos);
$total_msg_contatos = mysqli_num_rows($resultado_msg_contatos);