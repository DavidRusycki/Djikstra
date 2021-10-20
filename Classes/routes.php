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
            $aCaminhos[] = $this->getCaminhoCompleto($oVertice, $aVertices);
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
            $sCaminho .= $this->getPrecedenteRecursive($aVertices[$oVertice->getPrecedente()], $aVertices) . ' - ' . $oVertice->getNome() ; 
        }
        else {
            $sCaminho = $oVertice->getNome();
        }
        return $sCaminho;
    }

}