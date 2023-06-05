<?php

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada</div>';
            break;
    }
}

$resultado = '';
$paginacao = ''; // nova definição da variável $paginacao
foreach ($opiniao as $opiniaos) {
    $resultado .= ' <tr>
                        <th>
                            <p>' . $opiniaos->titulo . '</p>
                            <iframe src=' . $opiniaos->link . ' width="560" height="315" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <textarea name="descricao" rows="5" cols="80">' . $opiniaos->descricao . '</textarea>
                            <a href="detalhesOpiniao.php?id=' . $opiniaos->id_opinion . '">
                            <button type="button" class="btn btn-success ms-2 mb-4">Ver detalhes</button>
                            </a>
                        </th>
                    </tr>';

    //Gets
    unset($_GET['pagina']);
    $gets = http_build_query($_GET);

    //paginação
    $paginas = $opPage->getPages();
	$paginacao = '';

	foreach ($paginas as $pagina) {
    	$class = $pagina['atual'] ? 'btn-primary' : 'btn-light';
    	$paginacao .= sprintf('<a href="?pagina=%s&%s">
                            	<button type="button" class="btn %s mb-3">%s</button> 
                          	</a>',
                          	$pagina['pagina'],
                          	$gets,
                          	$class,
                          	$pagina['pagina']);
	}
}

?>

<main>

    <?= $mensagem ?>

    <section>
        <?= $user ?>
    </section>

    <section>

        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>
                        <h2>Opiniões</h2>
                    </th>
                </tr>
            <tbody>
                <?= $resultado ?>
            </tbody>
            </thead>

        </table>
    </section>

    <section>
        <?= $paginacao ?>
    </section>

</main>