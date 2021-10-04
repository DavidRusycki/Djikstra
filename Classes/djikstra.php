<?php 
require_once "vertice.php";
/**
 * Classe para calcular o melhor caminho para cada vértice do grafo.
 * @author David Rusycki
 * @since 02/10/2021
 */
class djikstra {
    
    /** Constante que indica um suposto valor para infinito */
    const INFINITO = 9898989898;

    /** Armazena o resultado do calculo de rotas*/
    private $resultado;

    /**
     * Calcula as menores rotas de um ponto para todos os outros.
     * @param Array $aGrafo - Variável que contem o grafo a ser calculado.
     * @param String $sVerticeInicial - Indica o vertice inicial do calculo.
     * @param Boolean $bAtualiza - Indica de deve atualizar o atributo de resultado da classe.
     */
    public function calcularRotas($aGrafo, $sVerticeInicial, $bAtualiza = true) {
        $aNaoVisitados = $this->getArrayNaoVisitados($aGrafo);
        $aVertices = $this->getArrayVertices($aGrafo);
        $aVertices[$sVerticeInicial]->setCusto(0);

        // @TODO - Verificar a possibilidade de mover isso para dentro do processamento geral. 
        //Começar passando pelos relacionamentos do inicial.
        $this->trataVertices($aVertices, $sVerticeInicial);
        unset($aNaoVisitados[$sVerticeInicial]);

        //Passar por todos os outros não visitados até que todos sejam visitados
        while(count($aNaoVisitados) > 0) {
            $sVertice = $this->getMenorCustoFromNaoVisitados($aNaoVisitados, $aVertices);
            $this->trataVertices($aVertices, $sVertice);
            $aVertices[$sVertice]->setVisitado(true);
            unset($aNaoVisitados[$sVertice]);
        }

        $this->verificaAtualizacaoResultado($bAtualiza, $aVertices);

        return $aVertices;
    }

    /**
     * Retorna um array com todos os vertices do grafo considerando todos como não visitados.
     * @param Array $aGrafo
     * @return Array $aResult
     */
    private function getArrayNaoVisitados($aGrafo) {
        $aResult = [];
        foreach ($aGrafo as $sIndice => $aRelacionados) {
            $aResult[$sIndice] = 1;
        }
        return $aResult;
    }

    /**
     * Função que retorna o array de vértices preparado para o processamento. 
     *  Inserindo informações iniciais requisitadas.
     * @param Array $aGrafo
     * @return Array $aResult
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
     * @return String $sResult
     */
    private function getMenorCustoFromNaoVisitados($aNaoVisitados, $aVertices) {
        $iMenor = null;
        $sResult = null;
        foreach($aNaoVisitados as $sIndice => $sVertice) {
            if ($aVertices[$sIndice]->getCusto() < $iMenor || empty($iMenor)) {
                $iMenor = $aVertices[$sIndice]->getCusto();
                $sResult = $sIndice;
            }
        }
        return $sResult;
    }

    /**
     * Verifica se foi definido para atualizar o resultado ou não.
     * Necessário para caso a pessoa não queira atualizar o resultado anterior do cálculo.
     * @param Boolean $bAtualiza
     * @param Mixed $xResult
     */
    private function verificaAtualizacaoResultado($bAtualiza, $xResult) {
        if ($bAtualiza) {
            $this->setResultado($xResult);
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
     * @return Array
     */ 
    public function getResultado() {
        return $this->resultado;
    }

    /**
     * Seta o resultado do processamento.
     * @param Array $aResultado
     */ 
    public function setResultado($aResultado) {
        $this->resultado = $aResultado;
    }

}
