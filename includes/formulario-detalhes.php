<?php

use \App\Session\Login;

$resultado = '';
foreach ($comentario as $comentarios) {
    if ($comentarios->criador == $opOpiniao->criador) {
        $detalhes = Login::getUsuarioLogado() ? '<a href="excluirComentario.php?id=' . $comentarios->id_comment . '">
                                                <button type="button" class="btn btn-danger ms-2 mt-2">Excluir</button></a>' : null;

        $resultado .= '
            <div class="form-group mt-3">
                <h4>' . $comentarios->nome . '</h4>
                <textarea class="form-control" name="descricao" rows="5">' . $comentarios->descricao . '</textarea>
                ' . $detalhes . '
            </div>';
    }
}



$usuarioLogado = Login::getUsuarioLogado();

$detalhes = $usuarioLogado ? '<a href="editarOpiniao.php?id=' . $opOpiniao->id_opinion . '">
                            <button type="button" class="btn btn-primary mt-2">Editar</button></a>
                            <a href="excluirOpiniao.php?id=' . $opOpiniao->id_opinion . '">
                            <button type="button" class="btn btn-danger ms-2 mt-2">Excluir</button></a>' : null;

$adicionar = $usuarioLogado ? '<a href="cadastrarComentario.php"><button class="btn btn-success">Adicionar comentário</button></a>' : null;
?>


<main>
    <section>
        <a href="index.php"><button class="btn btn-success mt-2 bi bi-arrow-left"></button></a>
    </section>

    <section>

        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>
                        <h2>Opinião</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <p><strong>Titulo:</strong> <?= $opOpiniao->titulo ?></p>
                        <p><strong>Criador:</strong> <?= $opOpiniao->criador ?></p>
                        <iframe src='<?= $opOpiniao->link ?>' width="560" height="315" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <p><?= $opOpiniao->data ?></p>
                    </th>
                </tr>
                <tr>
                    <th>
                        <textarea class="form-control" name="descricao" rows="5"><?= $opOpiniao->descricao ?></textarea>
                        <?= $detalhes ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h2>Comentários</h2>
                        <?= $adicionar ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        <?= $resultado ?>
                    </th>
                </tr>
            </thead>

        </table>
    </section>

</main>