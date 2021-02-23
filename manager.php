<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/knacss.min.css">
    <link rel="stylesheet" href="css/indexSansGrid.css">
    <link rel="stylesheet" href="css/moviemanager.css" />
    <title>Movie manager</title>
</head>
<body>
<section>
    <div>
        <h1>Gestion des recettes Marmitop</h1>
    </div>
</section>
<section id="listrecipes">
    <table>
        <thead>
        <tr>
            <th colspan="2">Recettes Marmitop</th>
        </tr>
        </thead>
        <tbody>
    <?php
    try
    {
// On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=marmitop;charset=utf8', 'root', '5MichelAnnecy', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
    // On récupère tout le contenu de la table film
    $reponse = $bdd->query('SELECT id,nom FROM recette');
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
        ?>
        <tr>
            <td><?php echo $donnees['nom']?></td>
            <td><a href="deleterecipe.php?id=<?php echo $donnees['id']?>">Supprimer</a></td>
        </tr>
        <?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
    ?>
        </tbody>
    </table>
</section>
<section id="form">
    <h3>Ajouter une recette</h3>
    <form action="/addrecipe.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="titre">Nom de la recette :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="image">Image de la recette: </label>
            <input type="file" id="image" name="image" required>
        </div>
        <div>
            <label for="pays">Temps de préparation:</label>
            <input type="time" id="tps_prep" name="tps_prep" required>
        </div>
        <div>
            <label for="duree">Temps de cuisson:</label>
            <input type="time" id="tps_cuisson" name="tps_cuisson" required>
        </div>
        <div>
            <label for="real">Chef:</label>
            <input type="text" id="chef" name="chef" required>
        </div>
        <div>
            <label for="interpretes">citation:</label>
            <input type="text" id="citation" name="citation" required>
        </div>
        <div>
            <label for="synopsis">Lien vers la recette :</label>
            <input type="text" id="url" name="url" required>
        </div>
        <div>
            <label for="synopsis">Ingrédients :</label>
            <textarea id="ingredients" name="ingredients" required></textarea>
        </div>
        <div>
            <input type="submit" name="valid" value="Ajouter la recette" id="valid">
        </div>
    </form>
</section>
</body>
</html>