<?php
/**
 * Classe que representa os vértices do grafo.
 * @author David Rusycki
 * @since 02/10/2021
 */
class vertice {
    
    private $nome;
    private $relacionamentos = [];
    private $visitado;
    private $custo;
    private $precedente;
    
    /**
     * Adiciona um relacionamento para o vértice.
     * @param String $sIndiceRelacionamento
     * @param Integer $iValorAresta
     */
    public function addRelacionamento($sIndiceRelacionamento, $iValorAresta) {
        $this->relacionamentos[$sIndiceRelacionamento] = $iValorAresta;
    }

    /**
     * Verifica a necessidade de atualizar o custo do vértice.
     * Caso o custo da estimativa atual for menor que o menor custo conhecido, atualiza o custo.
     * Caso o custo da estimativa atual não for menor que o menor custo conhecido não atualiza nada.
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
     * Retorna o nome do vértice.
     * @return String
     */ 
    public function getNome() {
        return $this->nome;
    }

    /**
     * Seta o nome do vértice.
     * @param String $sNome 
     */ 
    public function setNome($sNome) {
        $this->nome = $sNome;
    }

    /**
     * Retorna os relacionamentos do Vértice.
     * @return Array
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
     * Retorna se o vértice já foi visitado.
     * @return Boolean
     */ 
    public function getVisitado() {
        return $this->visitado;
    }

    /**
     * Seta se o vértice já foi visitado.
     * @param Booelan %bVisitado
     */ 
    public function setVisitado($bVisitado) {
        $this->visitado = $bVisitado;
    }

    /**
     * Retorna o custo para chegar no vértice.
     * @return Integer
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
     * Retorna o precedente do vértice.
     * @return String 
     */ 
    public function getPrecedente() {
        return $this->precedente;
    }

    /**
     * Seta o precedente do vértice. 
     * @param String $sPrecedente
     */ 
    public function setPrecedente($sPrecedente) {
        $this->precedente = $sPrecedente;
    }

}


