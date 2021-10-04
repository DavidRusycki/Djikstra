<?php
/**
 * Classe para inserir as informaçõs dos nós do grafo e seus relacionamentos.
 * @author David Rusycki
 * @since 02/10/2021
 */
class grafo {
    
    /**
     * Atributo para armazenar as informações.
     */
    private $grafo = [];

    /**
     * {@inheritDoc}
     */
    public function __construct() {
        $this->setGrafo(
            [
                'a' => ['b' => 2, 'c' => 4],
                'b' => ['e' => 7, 'a' => 2, 'd' => 3],
                'c' => ['a' => 4, 'e' => 9],
                'd' => ['b' => 3, 'e' => 1, 'a' => 6],
                'e' => ['c' => 9, 'b' => 2, 'd' => 1]
            ]
        );
    }

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
        return $this->grafo;
    }

}