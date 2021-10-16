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
                'RR' => ['PA' => 150, 'TO' => 180, 'RJ' => 355, 'SP' => 380],
                'AP' => ['AC' => 330, 'RN' => 195, 'DF' => 110, 'SP' => 310],
                'AM' => ['TO' => 453, 'BA' => 449, 'MS' => 88,  'SP' => 210],
                'PA' => ['RR' => 150, 'RO' => 385, 'RJ' => 212, 'SP' => 210],
                'AC' => ['AP' => 330, 'PI' => 679, 'DF' => 197, 'RJ' => 505],
                'RO' => ['PA' => 385, 'SE' => 470, 'RJ' => 325, 'SP' => 384],
                'TO' => ['RR' => 180, 'AM' => 453, 'MS' => 300, 'SP' => 160],
                'MA' => ['MT' => 112, 'DF' => 144, 'MG' => 165, 'SC' => 370],
                'PI' => ['AC' => 679, 'CE' => 80,  'DF' => 150, 'SC' => 300],
                'CE' => ['PI' => 80,  'DF' => 150, 'PR' => 320, 'SC' => 310],
                'RN' => ['AP' => 195, 'AL' => 38,  'DF' => 102, 'RJ' => 185],
                'PB' => ['SE' => 32,  'GO' => 128, 'RJ' => 305, 'SP' => 160],
                'PE' => ['DF' => 150, 'GO' => 170, 'MG' => 155, 'RJ' => 165],
                'AL' => ['RN' => 38,  'BA' => 85,  'RJ' => 155, 'SP' => 160],
                'SE' => ['RO' => 470, 'PB' => 32,  'RJ' => 97,  'SP' => 155],
                'BA' => ['AM' => 449, 'AL' => 85,  'RJ' => 118, 'SP' => 129],
                'MT' => ['MA' => 112, 'DF' => 96,  'RJ' => 150, 'SC' => 230],
                'DF' => ['AP' => 110, 'AC' => 197, 'MA' => 144, 'PI' => 150, 
                         'CE'=> 150,  'RN' => 102, 'PE' => 150, 'MT' => 96, 
                         'GO' => 43,  'MG' => 75,  'RJ' => 105, 'PR' => 110, 
                         'SC' => 205],
                'GO' => ['PB' => 128, 'PE' => 170, 'DF' => 43,  'RJ' => 90],
                'MS' => ['AM' => 445, 'TO' => 300, 'RJ' => 121, 'SP' => 88],
                'MG' => ['MA' => 165, 'PE' => 155, 'DF' => 75,  'SC' => 200],
                'ES' => ['SC' => 195],
                'RJ' => ['RR' => 355, 'PA' => 212, 'AC' => 505, 'RO' => 325, 
                         'RN' => 185, 'PB' => 305, 'PE' => 165, 'AL' => 155, 
                         'SE' => 97,  'BA' => 118, 'MT' => 150, 'DF' => 105, 
                         'GO' => 90,  'MS' => 121, 'SP' => 105, 'PR' => 80],
                'SP' => ['RR' => 380, 'AP' => 310, 'AM' => 210, 'PA' => 210,
                         'RO' => 384, 'TO' => 160, 'PB' => 160, 'AL' => 160,
                         'SE' => 155, 'BA' => 129, 'MS' => 88,  'RJ' => 105],
                'PR' => ['CE' => 320, 'DF' => 110, 'RJ' => 80,  'SC' => 150],
                'SC' => ['MA' => 370, 'PI' => 300, 'CE' => 310, 'MT' => 230,
                         'DF' => 205, 'MG' => 200, 'ES' => 195, 'PR' => 150,
                         'RS' => 60],
                'RS' => ['SC' => 60]
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