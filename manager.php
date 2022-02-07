<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recipe Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<h1 class="text-center">Gestion des recettes</h1>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Recette</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=marmitop;charset=utf8', 'root', '5MichelAnnecy', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
                }
                catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                $reponse = $bdd->query('SELECT id,nom FROM recette');
                while ($donnees = $reponse->fetch())
                {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $donnees['id'] ?></th>
                        <td><?php echo $donnees['nom'] ?></td>
                        <td><a href="deletemovie.php?id=<?php echo $donnees['id']?>"><button class="btn btn-warning">Supprimer</button></a></td>
                    </tr>
                    <?php
                }
                $reponse->closeCursor()
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row m-5 text-center">
        <h2>Ajouter un film</h2>
    </div>
    <div class="row m-3 align-items-center">
        <form action="addrecipe.php" method="post" enctype="multipart/form-data">
            <div class="row mb-1 align-items-center">
                <div class="col-2 text-end">
                    <label class="col-form-label" for="titre">Nom de la recette :</label>
                </div>
                <div class="col-10">
                    <input class="form-control" type="text" id="nom" name="nom" required>
                </div>
            </div>
            <div class="row mb-1 align-items-center">
                <div class="col-2 text-end">
                    <label class="col-form-label" for="image">Image de la recette: </label>
                </div>
                <div class="col-10">
                    <input class="form-control" type="file" id="image" name="image" required>
                </div>
                <div class="row mb-1 align-items-center">
                    <div class="col-2 text-end">
                        <label class="col-form-label" for="tps_prep">Temps de préparation:</label>
                    </div>
                    <div class="col-10">
                        <input class="form-control" type="time" id="tps_prep" name="tps_prep" required>
                    </div>
                </div>
                <div class="row mb-1 align-items-center">
                    <div class="col-2 text-end">
                        <label class="col-form-label" for="tps_cuisson">Temps de cuisson:</label>
                    </div>
                    <div class="col-10">
                        <input class="form-control" type="time" id="tps_cuisson" name="tps_cuisson" required>
                    </div>
                </div>
                <div class="row mb-1 align-items-center">
                    <div class="col-2 text-end">
                        <label class="col-form-label" for="chef">Chef:</label>
                    </div>
                    <div class="col-10">
                        <input class="form-control" type="text" id="chef" name="chef" required>
                    </div>
                </div>
                <div class="row mb-1 align-items-center">
                    <div class="col-2 text-end">
                        <label class="col-form-label" for="citation">citation:</label>
                    </div>
                    <div class="col-10">
                        <input class="form-control" type="text" id="citation" name="citation" required>
                    </div>
                </div>
                <div class="row mb-1 align-items-center">
                    <div class="col-2 text-end">
                        <label class="col-form-label" for="url">Lien vers la recette :</label>
                    </div>
                    <div class="col-10">
                        <input class="form-control" type="text" id="url" name="url" required>
                    </div>
                </div>
                <div class="row mb-1 align-items-center">
                    <div class="col-2 text-end">
                        <label class="col-form-label" for="ingredients">Ingrédients :</label>
                    </div>
                    <div class="col-10">
                        <textarea class="form-control" id="ingredients" name="ingredients" required></textarea>
                    </div>
                </div>
                <div class="row mb-1 align-items-center">
                    <div class="col-12 text-end">
                        <button class="btn btn-primary" name="valid" id="valid">Valider</button>
                    </div>
                </div>
                <form>
            </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

