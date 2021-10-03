<?php 
require_once "vertice.php";
/**
 * Classe para calcular o melhor caminho para cada vértice do grafo.
 * @author David Rusycki
 */
class djikstra {
    
    const INFINITO = 9898989898;

    private $resultado;

    public function calcularRotas($aGrafo, $sVerticeInicial) {
        $aVisitados = [];
        $aVertices = [];
        
        $this->getArrayVertices($aGrafo);

    }

    /**
     * Função quer retorna o array de vértices preparado para o processamento.
     */
    private function getArrayVertices($aGrafo) {
        $aResult = [];
        foreach ($aGrafo as $sIndice => $aVertice) {
            $oNew = $this->getInstanceVertice();
            $oNew->setNome($sIndice);
            foreach ($aVertice as $sVerticeRelacionado => $iCustoAresta) {
                $oNew->addRelacionamento();
            }
            $aResult[$sIndice] = $oNew;
        }
    }

    /**
     * Retorna uma instância da classe vertice.
     * @return vertice
     */
    private function getInstanceVertice() {
        return new \vertice();
    }

    /**
     * Retorna o resultado do processamento.
     * @return ??????????????????????????????????
     */ 
    public function getResultado() {
        return $this->resultado;
    }

    /**
     * Seta o resultado do processamento.
     * @param ??????????????????????????????????
     */ 
    public function setResultado($resultado) {
        $this->resultado = $resultado;
    }

}
