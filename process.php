<?php

    $title = 'Processing - Le Chouette Coin';
    require 'includes/header.php';

    // Verrouiller l'accès à la page process aux méthodes POST.
    if ('POST' != $_SERVER['REQUEST_METHOD']) {
        echo "<div class='alert alert-danger'> La page à laquelle vous tentez d'accéder n'existe pas </div>";
    // Le elseif va servir au traitement du formulaire de création de produits
    } elseif (isset($_POST['product_submit'])) {
        // Vérification back-end du remplissage du formulaire
        if (!empty($_POST['product_name']) && !empty($_POST['product_description']) && !empty($_POST['product_price']) && !empty($_POST['product_city']) && !empty(['product_category'])) {
            // Définition des variables
            $name = strip_tags($_POST['product_name']);
            $description = strip_tags($_POST['product_description']);
            $price = intval(strip_tags($_POST['product_price']));
            $city = strip_tags($_POST['product_city']);
            $category = strip_tags($_POST['product_category']);
            // Assigne la variable user_id à partir du token de session
            $user_id = $_SESSION['id'];
            // Lancement de la fonction d'ajout de produits
            ajoutProduits($name, $description, $price, $city, $category, $user_id);
        } else {
            echo "<div class='alert alert-danger'> Error Ajout </div>";
        }
    }
    require 'includes/footer.php';
