<?php

namespace core\models;

use core\classes\Database;
use core\classes\Store;

class Clientes{

    //============================================================

    public function verificar_email_existe($email){

        //verifica se já existe outra conta com o mesmo email
        $bd = new Database();
        $parametros = [
            ':email' => strtolower(trim($email))
        ];
        $resultados = $bd->select("SELECT email FROM clientes WHERE email = :email", $parametros);

        // se o cliente já existe...
        if(count($resultados) != 0){
            return true;
        } else{
            return false;
        }

    }

    //============================================================

    public function registrar_cliente(){
        // registra um novo cliente na base de dados
        $bd = new Database();

        //cria uma hash para o registro do cliente
        //$purl = Store::criarHash();

        //parametros
        $parametros = [
            ':email' => strtolower(trim($_POST['text_email'])),
            ':senha' => (trim($_POST['text_senha_1'])),
            ':nome_completo' => (trim($_POST['text_nome_completo'])),
            ':endereco' => (trim($_POST['text_endereco'])),
            ':cidade' => (trim($_POST['text_cidade'])),
            ':telefone' => (trim($_POST['text_telefone'])),
            ':purl' => null,
            ':ativo' => 1
        ];

        $bd->insert("
        INSERT INTO clientes VALUES(
            0,
            :email,
            :senha,
            :nome_completo,
            :endereco,
            :cidade,
            :telefone,
            :purl,
            :ativo,
            NOW(),
            NOW(),
            NULL
            )
        ", $parametros);

    }
    /*
    //============================================================

    public function validar_email($purl){

        //validar o email do novo cliente
        $bd = new Database();
        $parametros = [':purl'=>$purl];
        $resultados = $bd->select("SELECT * FROM clientes
         WHERE purl = :purl ", $parametros);

        //verifica se foi encontrado o cliente
        if(count($resultados) != 1){
            return false;
        }

        // foi encontrado este cliente com o purl indicado
        $id_cliente = $resultados[0]->id_cliente;

        //atualizar os dados do cliente
        $parametros = [
            ':id_cliente' => $id_cliente
        ];

        $bd->update("UPDATE clientes SET
         purl = NULL,
         ativo = 1,
         updated_at = NOW() WHERE id_cliente = :id_cliente
        ", $parametros);

        return true;
        
    }

    //============================================================
    */

}

?>