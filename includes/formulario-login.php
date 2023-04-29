<?php

$alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger">' . $alertaLogin . '</div>' : '';

?>


<div class="jumbotron text-dark">

    <div class="row">

        <div class="col">

            <form method="post">

                <h2>Login</h2>

                <?= $alertaLogin ?>

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>

                <div class="form-group">
                    <p>Não tem uma conta ? <a href="cadastrar.php">Crie uma aqui</a></p>
                </div>

                <div class="form-group">
                    <button type="submit" name="acao" value="logar" class="btn btn-primary mb-3">Entrar</button>
                </div>

            </form>

        </div>

    </div>

</div>