<?php
try
{
// On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=marmitop;charset=utf8', 'root', '5MichelAnnecy');
}
catch(Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
// On récupère tout le contenu de la table film
$req_nav = $bdd->query('SELECT id, nom FROM recette');
$req_carousel = $bdd->query('SELECT image FROM recette');
$req_recettes = $bdd->query('SELECT * FROM recette');
?>

<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="img/marmitop-icon.png" />
    <title>Marmitop, le top des chef sur Marmiton</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Marmitop</a>
        <ul class="navbar-nav">
            <?php
            $i = 0;
            while ($donnees = $req_nav->fetch())
            {
                $i++;?>
            <li class="nav-item"><a class="nav-link" id="bp<?php echo $donnees['id']?>" href="#recipe<?=$donnees['id']?>"><?=$donnees['nom']?></a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Les recettes favorites des grands chefs sur Marmiton</h1>
</div>
<div class="container">
    <div class="row">
        <div class="container">
            <div id="carouselRecipeIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php if ($i != 0)
                    {?>
                    <li data-target="#carouselRecipeIndicators" data-slide-to="0" class="active"></li>
                    <?php }
                    $j = 1;
                    while ($j < $i)
                    {
                        ?>
                    <li data-target="#carouselRecipeIndicators" data-slide-to="<?=$j?>"></li>
                    <?php
                        $j++;
                    }?>
                </ol>
                <div class="carousel-inner">
                    <?php $donnees = $req_carousel->fetch();
                    ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/recipes/<?=$donnees['image']?>" alt="<?=$donnees['image']?>">
                    </div>
                    <?php while ($donnees = $req_carousel->fetch())
                    {?>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/recipes/<?=$donnees['image']?>" alt="<?=$donnees['image']?>">
                    </div>
                    <?php
                    }?>
                </div>
                <a class="carousel-control-prev" href="#carouselRecipeIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselRecipeIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <br>
    </div>
    <div class="row">
        <?php while ($donnees = $req_recettes->fetch())
        {?>
        <div class="container" id="recipe<?=$donnees['id']?>">
            <div class="row">
                <div class="col">
                    <img src="img/recipes/<?=$donnees['image']?>" class="img-fluid rounded mx-auto d-block" />
                </div>
                <div class="col-6">
                    <a href="<?=$donnees['url']?>"><h3><?=$donnees['nom']?></h3></a>
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th scope="row">Ingrédients</th>
                            <td><?=$donnees['ingredients']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Temps de préparation</th>
                            <td><?php
                                $time = $donnees['tps_prep'];
                                $time_formated = DateTime::createFromFormat('H:i:s', $time);
                                echo $time_formated->format('H\hi')?></td>
                        </tr>
                        <tr>
                            <th scope="row">Temps de cuisson</th>
                            <td><?php
                                $time = $donnees['tps_cuisson'];
                                $time_formated = DateTime::createFromFormat('H:i:s', $time);
                                echo $time_formated->format('H\hi')?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <blockquote class="blockquote pt-5">
                        <p class="mb-0"><?=$donnees['citation']?></p>
                        <footer class="blockquote-footer"><?=$donnees['chef']?></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <?php }?>

    </div>
</div>

<footer>
    <p>Etienne Buffet copyright 2021</p>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>