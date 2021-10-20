<?php
require_once "./classes/grafo.php";
require_once "./classes/djikstra.php";

//Cria uma instância da classe grafo que contem as informações para o processamento.
$oGrafo = new \grafo();
// Cria uma instância da classe que realiza o calculo da informações setadas na classe grafo.
$oDjikstra = new \djikstra();
//Chama a função que calcula as rotas do grafo e passa o vértice inicial
$aRetorno = $oDjikstra->calcularRotas($oGrafo->getGrafo(), 'RR');
//Exibe o resultado na tela.
var_dump($aRetorno);
var_dump($oDjikstra->getRotas($aRetorno));