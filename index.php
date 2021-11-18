<?php
require_once "./classes/grafo.php";
require_once "./classes/djikstra.php";
require_once "./classes/viewRotas.php";
require_once "./classes/routes.php";

//Cria uma instância da classe grafo que contem as informações para o processamento.
$oGrafo = new \grafo();
// Cria uma instância da classe que realiza o calculo da informações setadas na classe grafo.
$oDjikstra = new \djikstra();
//Cria uma instância da classe responsável pela visualização das rotas.
$oView = new \viewRotas();
//Cria uma instância da classe responsável pela geração das strings de rotas.
$oRoutes = new \routes();
//Chama a função que calcula as rotas do grafo e passa o vértice inicial.
$aRetorno = $oDjikstra->calcularRotas($oGrafo->getGrafo(), 'RR');
//Monta as strings contendo as melhores rotas de acordo com o resultado do processamento.
$aRotas = $oRoutes->getRotas($aRetorno);
//Exibe o resultado na tela.
$oView->exibeRotas($aRotas);

// var_dump($aRetorno);
// var_dump($aRetorno);
// var_dump($aRotas);