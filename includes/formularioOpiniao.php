<main>

    <a href="index.php"><button class="btn btn-success mt-2 bi bi-arrow-left"></button></a>
    </section>

    <h2 class="mt-3"><?= TITLE ?></h2>

    <form method="POST">

        <div class="form-group">
            <label>Criador</label>
            <input type="text" class="form-control" name="criador" value="">
        </div>
        <div class="form-group">
            <label>Título:</label>
            <input type="text" class="form-control" name="titulo" value="">
        </div>
        <div class="form-group">
            <label>Link:</label>
            <input type="text" class="form-control" name="link" value="">
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" name="descricao" rows="5"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success mt-3 mb-2">Enviar</button>
        </div>

    </form>

</main>