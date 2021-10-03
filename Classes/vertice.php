<?php
/**
 * Classe que representa os vértices do grafo.
 * @author David Rusycki
 */
class vertice {
    
    private $nome;
    private $relacionamentos = [];
    private $visitado;
    private $custo;
    private $precedente;

    /**
     * Retorna o nome do vértice.
     */ 
    public function getNome() {
        return $this->nome;
    }

    /**
     * Seta o nome do vértice.
     */ 
    public function setNome($sNome) {
        $this->nome = $sNome;
    }

    /**
     * Retorna os relacionamentos do Vértice.
     */ 
    public function getRelacionamentos() {
        return $this->relacionamentos;
    }

    /**
     * Seta os relacionamentos do vértice.
     * @param Array $aRelacionamento
     */ 
    public function setRelacionamentos($aRelacionamentos) {
        $this->relacionamentos = $aRelacionamentos;
    }
    
    /**
     * Adiciona um relacionamento para o vértice.
     * @param String $sIndiceRelacionamento
     * @param Integer $iValorAresta
     */
    public function addRelacionamento($sIndiceRelacionamento, $iValorAresta) {
        $this->relacionamentos[$sIndiceRelacionamento] = $iValorAresta;
    }

    /**
     * Retorna se o vértice já foi visitado.
     */ 
    public function getVisitado() {
        return $this->visitado;
    }

    /**
     * Seta se o vértice já foi visitado.
     */ 
    public function setVisitado($bVisitado) {
        $this->visitado = $bVisitado;
    }

    /**
     * Retorna o custo para chegar no vértice.
     */ 
    public function getCusto() {
        return $this->custo;
    }

    /**
     * Seta o custo para chegar no vértice.
     * @param Integer $iCusto
     */ 
    public function setCusto($iCusto) {
        $this->custo = $iCusto;
    }

    /**
     * Verifica a necessidade de atualizar o custo do vértice.
     * @param Integer $iCusto
     * @param String $sPrecedente
     */
    public function verificaAtualizacaoCusto($iCusto, $sPrecedente) {
        if ($iCusto < $this->getCusto()) {
            $this->setCusto($iCusto);
            $this->setPrecedente($sPrecedente);
        }
    }

    /**
     * Retorna o precedente do vértice.
     */ 
    public function getPrecedente() {
        return $this->precedente;
    }

    /**
     * Seta o precedente do vértice. 
     */ 
    public function setPrecedente($precedente) {
        $this->precedente = $precedente;
    }

}


