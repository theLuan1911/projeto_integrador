<?php

namespace core\classes;

use Exception;

class Store{
    
    // ============================================================
    
    public static function layout($estruturas, $dados = null){

        // verifica se as estruturas são um array
        if (!is_array($estruturas)) {
            throw new Exception("Coleção de estruturas inválida");
        }

        // variáveis
        if (!empty($dados) && is_array($dados)) {
            extract($dados);
        }


        // apresentar as views da aplicação
        foreach ($estruturas as $estrutura) {
            include("../core/views/$estrutura.php");
        }

    }

    // ============================================================

    public static function clienteLogado(){

        //verifica se existe um cliente com sessão
        return isset($_SESSION['cliente']);
    }

    /*
    // ============================================================

    public static function criarHash($num_caracteres = 12){

        //criar hashes
        $chars = '01234567890123456789abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($chars), 0, $num_caracteres);


    }

    // ============================================================
    */




}
/*

html_header.php
nav_bar.php
inicio.php
html_footer.php

*/