<div class="container">
    <div class="row my-5">
        <div class="col-sm-6 offset-sm-3">
            <h3 class="text-center">Registro de Novo Cliente</h3>

            <form action="?a=criar_cliente" method="post">

            <!--email-->
            <div class="my-3">
                <label>Email:</label>
                <input class="form-control" type="email" name="text_email" placeholder="Digite seu email" required>
            </div>

            <!--senha_1-->
            <div class="my-3">
                <label>Senha:</label>
                <input class="form-control" type="password" name="text_senha_1" placeholder="Digite sua senha" required>
            </div>

            <!--senha_2-->
            <div class="my-3">
                <label>Repetir a senha:</label>
                <input class="form-control" type="password" name="text_senha_2" placeholder="Confirme sua senha" required>
            </div>

            <!--nome completo-->
            <div class="my-3">
                <label>Nome Completo:</label>
                <input class="form-control" type="text" name="text_nome_completo" placeholder="Digite seu Nome Completo" required>
            </div>

            <!--endereço-->
            <div class="my-3">
                <label>Endereço:</label>
                <input class="form-control" type="text" name="text_endereco" placeholder="Digite seu endereço" required>
            </div>

            <!--cidade-->
            <div class="my-3">
                <label>Cidade:</label>
                <input class="form-control" type="text" name="text_cidade" placeholder="Digite sua cidade" required>
            </div>

            <!--telefone-->
            <div class="my-3">
                <label>Telefone:</label>
                <input class="form-control" type="text" name="text_telefone" placeholder="Digite seu Telefone">
            </div>

            <!--submit-->
            <div class="my-4">
                <input type="submit" value="Criar conta" class="btn btn-primary">
            </div>

            <?php if(isset($_SESSION['erro'])):?>
                <div class="alert alert-danger text-center p-2">
                    <?= $_SESSION['erro']?>
                    <?php unset($_SESSION['erro'])?>
                </div>
            <?php endif;?>

            </form>

            
        </div>
    </div>
</div>

<!--

email *
senha_1 *
senha_2 *
nome_completo *
endereco *
cidade *
telefone *
-->