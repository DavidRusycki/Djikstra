<?php
/**
 * Classe para inserir as informaçõs dos nós do grafo e seus relacionamentos.
 * @author David Rusycki
 */
class grafo {
    
    /**
     * Atributo para armazenar as informações.
     */
    private $grafo = [];

    /**
     * Função que retorna o array que representa o graf.
     * @param Array $aArray - Array a ser setado como grafo.
     */
    public function setGrafo($aArray) {
        $this->grafo = $aArray;
    }

    /**
     * Retorna o grafo.
     * @return Array
     */
    public function getGrafo() {
        // return $this->grafo;
        // Colocado assimm até pensar uma forma melhor de obter/setar isso
        return [
            'a' => ['b' => 10, 'c' => 5],
            'b' => ['a' => 10, 'c' => 16],
            'c' => ['a' => 5, 'b' => 16],
        ];
    }

}