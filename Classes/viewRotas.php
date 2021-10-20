<?php
/**
 * Classe de visualização de rotas.
 * @author David Rusycki
 * @since 20/10/2021
 */
class viewRotas {

    /**
     * Exibe na tela as rotas passadas por parâmetro.
     * @param Array $aRotas - Array com as rotas a serem exibidas.
     */
    public function exibeRotas($aRotas) {
        foreach($aRotas as $sRota) {
            echo $sRota . '<br/>';
        }
    }

}
