<?php 
require_once "vertice.php";
/**
 * Classe para calcular o melhor caminho para cada vértice do grafo.
 * @author David Rusycki
 */
class djikstra {
    
    const INFINITO = 9898989898;

    private $resultado;

    /**
     * 
     */
    public function calcularRotas($aGrafo, $sVerticeInicial) {
        $aNaoVisitados = $this->getArrayNaoVisitados($aGrafo);
        $aVertices = $this->getArrayVertices($aGrafo);
        $aVertices[$sVerticeInicial]->setCusto(0);

        //Começar passando pelos relacionamentos do inicial.
        $this->trataVertices($aVertices, $sVerticeInicial);
        unset($aNaoVisitados[$sVerticeInicial]);

        //Passar por todos os outros não visitados até que todos sejam visitados
        while(count($aNaoVisitados) > 0) {
            $sVertice = $this->getMenorCustoFromNaoVisitados($aNaoVisitados, $aVertices);
            $this->trataVertices($aVertices, $sVertice);
            unset($aNaoVisitados[$sVerticeInicial]);
        }

        return $aVertices;
    }

    /**
     * Retorna o array de vertices não visitados ainda.
     * @param Array $aGrafo
     */
    private function getArrayNaoVisitados($aGrafo) {
        $aResult = [];
        foreach ($aGrafo as $sIndice => $aRelacionados) {
            $aResult[$sIndice] = 1;
        }
        return $aResult;
    }

    /**
     * Função que retorna o array de vértices preparado para o processamento. Inserindo informações iniciais requisitadas.
     * @param Array $aGrafo
     */
    private function getArrayVertices($aGrafo) {
        $aResult = [];
        foreach ($aGrafo as $sIndice => $aVertice) {
            $oNew = $this->getInstanceVertice();
            $oNew->setNome($sIndice);
            $oNew->setVisitado(false);
            $oNew->setCusto(self::INFINITO);
            foreach ($aVertice as $sVerticeRelacionado => $iCustoAresta) {
                $oNew->addRelacionamento($sVerticeRelacionado, $iCustoAresta);
            }
            $aResult[$sIndice] = $oNew;
        }
        return $aResult;
    }

    /**
     * Realiza a tratativa de todos os relacionamentos do vértice.
     * @param Array $aVertices
     * @param String $sNomeVertice
     */
    private function trataVertices($aVertices, $sNomeVertice) {
        $aRelacionamentos = $aVertices[$sNomeVertice]->getRelacionamentos();
        foreach ($aRelacionamentos as $sIndice => $iCusto) {
            $aVertices[$sIndice]->verificaAtualizacaoCusto($aVertices[$sNomeVertice]->getCusto()+$iCusto, $aVertices[$sNomeVertice]->getNome());
        }
    }

    /**
     * Retorna o nome do vértice de menor custo dentro dos não visitados
     * @param Array $aNaoVisitados
     * @param Array $aVertices
     */
    private function getMenorCustoFromNaoVisitados($aNaoVisitados, $aVertices) {
        $iMenor = null;
        $sResult = null;
        foreach($aNaoVisitados as $sVertice) {
            if ($aVertices[$sVertice]->getCusto() < $iMenor || empty($iMenor)) {
                $iMenor = $aVertices[$sVertice]->getCusto();
                $sResult = $sVertice;
            }
        }
        return $sResult;
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
