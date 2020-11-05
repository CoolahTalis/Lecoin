<?php

$title = 'PAge de Profil - Le Chouette Coin';
require 'includes/header.php';
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = '{$user_id}'";
$res = $conn->query($sql);
$user = $res->fetch(PDO::FETCH_ASSOC);
?>

<div class="row">
    <div class="col-7">
        <!-- LES ELEMENTS DISPLAYED SONT UNQIUEMENT CEUX DU CURRENT USER -->
        <table class="table table-dark mt-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nom du produit</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Categorie</th>
                    <th scope="col" colspan=3>Fonctions</th>
                </tr>
            </thead>
            <tbody>
                <?php
            affichageProduitsByUser($user_id);
        ?>
            </tbody>
        </table>
    </div>
    <!-- FORM MODIF PHONE -->
    <div class="offset-2 col-3 mt-5">
        <h4>Bienvenue <?php echo $user['username']; ?> !</h4>

        <form action="process.php" method="POST">
            <div class="form-group">
                <label for="InputPhone1"> Votre numéro de téléphone </label>
                <!-- INPUT W/ CONTROL FORM, A REVOIR !!! SPEC : REGEX TOUJOURS TRUE, A REVOIR !!! -->
                <input class="form-control" type="tel" name="user_phone" id="InputPhone1"
                    value="<?php echo $user['phone']; ?>"
                    pattern="[0-9]{10}">
            </div>
            <input type="hidden" name="user_id"
                value="<?php echo $user['id']; ?>">
            <input type="submit" class="btn btn-success" name="user_edit" value="Mettre à Jour">
        </form>
    </div>
</div>

<?php
require 'includes/footer.php';
