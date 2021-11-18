<?php
/**
 * Classe responsável pela geração das rotas.
 * @author David Rusycki
 * @since 20/10/2021
 */
class routes {

    /**
     * Retorna um array com as strings de rotas.
     * @param $aVertices - Array resultante do processamento.
     * @return $aCaminhos - Array de caminhos. 
     */
    public function getRotas($aVertices) {
        $aCaminhos = [];
        foreach($aVertices as $oVertice) {
            $aCaminhos[] = $this->getCaminhoCompleto($oVertice, $aVertices) . ' ' . $oVertice->getCusto();
        }
        return $aCaminhos;
    }

    /**
     * Método apenas para caso seja necessária alguma tratativa.
     * @param \Vertice $oVertice
     * @param Array $aVertices
     */
    private function getCaminhoCompleto($oVertice, $aVertices) {
        return $this->getPrecedenteRecursive($oVertice, $aVertices);
    }

    /**
     * Método recursivo para montagem das rotas.
     * @param \Vertice $oVertice
     * @param Array $aVertices
     * @return String $sCaminho
     */
    private function getPrecedenteRecursive($oVertice, $aVertices) {
        $sCaminho = '';
        if ($oVertice->getPrecedente() != null) {
            $sCaminho .= $this->getPrecedenteRecursive($aVertices[$oVertice->getPrecedente()], $aVertices) . ' - ' . $this->getNomeCerto($oVertice->getNome()) ; 
        }
        else {
            $sCaminho = $this->getNomeCerto($oVertice->getNome());
        }
        return $sCaminho;
    }

    private function getNomeCerto($sNome) {
        $aNomes = [
            'PR' => 'Paraná',
            'SC' => 'Santa Catarina',
            'RS' => 'Rio Grande do sul',
            'SP' => 'São Paulo',
            'RJ' => 'Rio de Janeiro',
            'ES' => 'Espirito Santo',
            'MG' => 'Minas Gerais',
            'MS' => 'Mato Grosso do Sul',
            'MT' => 'Mato Grosso',
            'DF' => 'Distrito Federal',
            'GO' => 'Goiás',
            'BA' => 'Bahia',
            'SE' => 'Sergipe',
            'AL' => 'Alagoas',
            'PB' => 'Paraiba',
            'RN' => 'Rio Grande do Norte',
            'PE' => 'Pernambuco',
            'CE' => 'Ceará',
            'MA' => 'Maranhão',
            'PI' => 'Piauí',
            'TO' => 'Tocantins',
            'AM' => 'Amazonas',
            'PA' => 'Pará',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'AC' => 'Acre',
            'AP' => 'Amapa'
        ];
        return $aNomes[$sNome];
    }

}