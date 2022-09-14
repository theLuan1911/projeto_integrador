<?php

namespace core\controllers;

use core\classes\Database;
use core\classes\EnviarEmail;
use core\classes\Store;
use core\models\Clientes;

class main{

    //============================================================
    
    public function index(){

        /*$email = new EnviarEmail();
        $email->enviar_email_confirmacao_novo_cliente();
        die('OK');
        */

       Store::layout([
        'layouts/html_header',
        'layouts/header',
        'inicio',
        'layouts/footer',
        'layouts/html_footer'
       ]);
    }

    //============================================================

    public function loja(){

        // apresenta a página da loja
        Store::layout([
            'layouts/html_header',
            'layouts/header',
            'loja',
            'layouts/footer',
            'layouts/html_footer'
        ]);
    }

    //============================================================

    public function novo_cliente(){

        //verifica se já existe sessão aberta
        if(Store::clienteLogado()){
            $this -> index();
            return;
        }


        // apresenta o layout para criar um novo utilizador 
        Store::layout([
            'layouts/html_header',
            'layouts/header',
            'novo_cliente',
            'layouts/footer',
            'layouts/html_footer'
        ]);
    }

    //============================================================

    public function criar_cliente(){
        // verifica se já existe sessão
        if(Store::clienteLogado()){
            $this -> index();
            return;
        }

        //verifica se houve submissão de um formulário
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this -> index();
            return;
        }

        // verifica se senha 1 = senha 2 
        if ($_POST['text_senha_1'] !== $_POST['text_senha_2']) {
            
            // as senhas são diferentes
            $_SESSION['erro'] = 'As senhas não estão iguais';
            $this->novo_cliente();
            return;
        }

        // verifica na base de dados se existe cliente com mesmo email      
        $cliente = new Clientes();
        if($cliente->verificar_email_existe($_POST['text_email'])){
            
            $_SESSION['erro'] = 'Já existe um cliente com o mesmo email';
            $this->novo_cliente();
            return;
        }

        //inserir novo cliente na base de dados e devolver o purl
        $email_cliente = strtolower(trim($_POST['text_email']));
        $purl = $cliente->registrar_cliente();

        /*
        //envio do email para o cliente
        $email = new EnviarEmail();
        $resultado = $email->enviar_email_confirmacao_novo_cliente($email_cliente, $purl);

        if($resultado){
            echo 'Email enviado';
        } else{
            echo 'Aconteceu um erro';
        }
        */

    }
    /*
    //============================================================

    public function confirmar_email(){

        // verifica se já existe sessão
        if(Store::clienteLogado()){
            $this -> index();
            return;
        }

        //verificar se existe na query string um purl
        if(!isset($_GET['purl'])){
            $this -> index();
            return;
        }

        $purl = $_GET['purl'];

        //verifica se um purl é valido
        if(strlen($purl) != 12){
            $this -> index();
            return;
        }

        $cliente = new Clientes();
        $resultado = $cliente->validar_email($purl);

        if($resultado){
            echo 'Conta Validada com sucesso';
        } else{
            echo 'A conta não foi validada';
        }


    }

    //============================================================
    */

    public function carrinho(){

        // apresenta a página do carrinho
        Store::layout([
            'layouts/html_header',
            'layouts/header',
            'carrinho',
            'layouts/footer',
            'layouts/html_footer'
        ]);
    }

    //============================================================
}