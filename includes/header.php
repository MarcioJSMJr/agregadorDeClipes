<?php

use \App\Session\Login;

$usuarioLogado = Login::getUsuarioLogado();

$usuario = $usuarioLogado ?
    '<a href="logout.php" class="btn btn-dark "><i class="bi bi-box-arrow-in-right"></i></a>' :
    '<a href="login.php" class="btn btn-dark "><i class="bi bi-box-arrow-in-right"></i></a>';


$user = $usuarioLogado ? '<a href="cadastrarOpiniao.php"><button class="btn btn-success mt-2">Nova opinião</button></a>' : null;

$busca = isset($_GET['busca']) ? htmlspecialchars($_GET['busca'], ENT_QUOTES | ENT_HTML5, 'UTF-8') : '';


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Agregador de Clipes</title>
    <!-- Adicionar o link para o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="icon" href="img/logo2.png">

    <style>
        body {
            background-image: url('img/night-sky.jpg');
            background-position: center;
        }
    </style>

</head>

<body class="text-black">

    <nav class="navbar navbar-expand-lg navbar-dark border-bottom shadow-sm mb-3" style="background-color: #fff">
        <div class="container">

            <a href="index.php" class=" btn btn-link" style="text-decoration: none; color: #000000;">
                <h2><img src="img/logo2.png" style="width: 100px;" alt="">AGREGACLIPE</h2>
            </a>

            <form method="GET">
                <div class="row">
                    <div class="col">
                        <input type="text" name="busca" class="form-control" style="width: 200px;" value="<?= $busca ?>">
                    </div>
                    <div class="col d-flex align-items-end">
                        <button type="submit" class="btn btn-dark"><i class="bi bi-search"></i></button>
                    </div>
                    <div class="col d-flex align-items-end">
                        <?= $usuario ?>
                    </div>
                </div>
            </form>

        </div>
    </nav>

    <div class="container rounded-top rounded-bottom" style="background-color: #fff">