<!-- PROCESS CHECK IF FUNCTION FAIT LE TAF, A REVOIR !!!-->
<?php

    $title = 'Processing - Le Chouette Coin';
    require 'includes/header.php';

    // VEROUILLE ACCES PAGE PROCES.PHP AUX METHODES POST
    if ('POST' != $_SERVER['REQUEST_METHOD']) {
        echo "<div class='alert alert-danger'> La page à laquelle vous tentez d'accéder n'existe pas </div>";
    // LE ELSEIF SERT AU TRAITEMENT DU FORM & CREATION DE PRODUITS
    } elseif (isset($_POST['product_submit'])) {
        // CHECK BACK-END FILL FORM
        if (!empty($_POST['product_name']) && !empty($_POST['product_description']) && !empty($_POST['product_price']) && !empty($_POST['product_city']) && !empty(['product_category'])) {
            // DEFINE VARIABLE
            $name = strip_tags($_POST['product_name']);
            $description = strip_tags($_POST['product_description']);
            $price = intval(strip_tags($_POST['product_price']));
            $city = strip_tags($_POST['product_city']);
            $category = strip_tags($_POST['product_category']);
            // ASSIGN VARIABLE USER_ID VIA TOKEN $_SESSION
            $user_id = $_SESSION['id'];
            // INIT FUNCTION AJOUT DE PRODUITS
            ajoutProduits($name, $description, $price, $city, $category, $user_id);
        }

        // 2ND ELSEIF POUR LE FORM DE MODIF
    } elseif (isset($_POST['product_edit'])) {
        // VERIF BACK-END DU FORM EDIT
        if (!empty($_POST['product_name']) && !empty($_POST['product_description']) && !empty($_POST['product_price']) && !empty($_POST['product_city']) && !empty(['product_category'])) {
            // DEFINE VARIABLES
            $name = strip_tags($_POST['product_name']);
            $description = strip_tags($_POST['product_description']);
            $price = intval(strip_tags($_POST['product_price']));
            $city = strip_tags($_POST['product_city']);
            $category = strip_tags($_POST['product_category']);
            // ASSIGN VAIRBALE USER_ID VIA TOKEN $_SESSION
            $user_id = $_SESSION['id'];
            $id = strip_tags($_POST['product_id']);

            modifProduits($name, $description, $price, $city, $category, $id, $user_id);
        }
        // DELETE ARTICLE
    } elseif (isset($_POST['product_delete'])) {
        // CE ECHO NE DOIT PAS DISPLAY SI DELETE SUCCESS, A FIX !!!
        echo "<div class= 'alert alert-danger'> Vos tentez de supprimer l'article n°".$_POST['product_id'].'</div>';

        try {
            $sth = $conn->prepare('DELETE FROM products WHERE products_id =:products_id AND user_id =:user_id');
            $sth->bindValue(':products_id', $_POST['product_id']);
            $sth->bindValue(':user_id', $_SESSION['id']);
            $sth->execute();

            echo "<div class= 'alert alert-danger'> Vous avez supprimé l'article n°".$_POST['product_id'].'</div>';
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
        // MODIF NUMERO PHONE
    } elseif (isset($_POST['user_edit'])) {
        try {
            $sth = $conn->prepare('UPDATE users SET phone =:phone WHERE id =:user_id');
            $sth->bindValue(':phone', $_POST['user_phone']);
            $sth->bindValue(':user_id', $_POST['user_id']);

            if ($sth->execute()) {
                echo "<div class= 'alert alert-success'> Vous avez mis à jour votre phone avec ".$_POST['user_phone'].'</div>';
            }
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    } elseif (isset($_POST['user_edit2'])) {
        $user_id = $_SESSION['user_id'];
        $phone = $_SESSION['user_phone'];
        echo "<div class= 'alert alert-danger'> Tentative de modification du phone de l'user".$_POST['user_id'].'avec le numéro '.$_POST['user_phone'].'!</div>';

        try {
            $sth = $conn->prepare('UPDATE users SET phone =:phone WHERE id =:user_id');
            $sth->bindValue(':phone', $phone);
            $sth->bindValue(':user_id', $user_id);

            if ($sth->execute()) {
                echo "<div class= 'alert alert-success'> Vous avez mis à jour votre phone ! </div>";
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }

    require 'includes/footer.php';
