<?php 
use core\classes\Store;
//$_SESSION['cliente'] = 1;
?>

<div class="container-fluid navegacao">
    <div class="row">
        <div class="col-6 p-3">
            <a href="?a=inicio">
                <h3><?= APP_NAME ?></h3>
            </a>
        </div>
        <div class="col-6 text-end p-3">

            <a href="?a=inicio" class="nav-item">Inicio</a>
            <a href="?a=loja" class="nav-item">Loja</a>

            <!--verifica se existe cliente na sessao-->
            <?php if(Store::clienteLogado()):?>

                <a href="?a=minha_conta" class="nav-item">A minha conta</a>
                <a href="?a=logout" class="nav-item">Logout</a>

            <?php else:?>

                <a href="?a=login" class="nav-item">Login</a>
                <a href="?a=novo_cliente" class="nav-item">Criar conta</a>

            <?php endif;?>


            <a href="?a=carrinho"><i class="fa-solid fa-cart-shopping"></i></a>
            
            <span class="badge bg-warning">3</span>
        </div>
    </div>
</div>