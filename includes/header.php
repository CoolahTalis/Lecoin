<?php
require 'includes/functions.php';
?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title><?php echo $title; ?>
    </title>
</head>

<body>
    <!-- NAVBAR  -->
    <nav class="navbar navbar-expand-lg" style="background: url(navfootbg.jpg);">
        <a class="navbar-brand" href="index.php">Le chouette coin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (!empty($_SESSION)) { ?>
                <div class="dropdown nav-item dropleft">
                    <a class="btn btn-secondary dropdown-toggle" href="index.php" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">Profil</a>
                        <a class="dropdown-item" href="addproducts.php">Ajouter un article</a>
                        <a class="dropdown-item" href="?logout">Déconnexion</a>
                    </div>
                </div>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="signin.php">S'identifier</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="container">