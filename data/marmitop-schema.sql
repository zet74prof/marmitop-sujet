drop database if exists marmitop;
create database marmitop;
use marmitop;

create table recette
(
    id          int auto_increment
        primary key,
    nom         varchar(100)  null,
    ingredients varchar(2500) null,
    tps_prep    time          null,
    tps_cuisson time          null,
    chef        varchar(100)  null,
    citation    varchar(500)  null,
    image       varchar(200)  null,
    url			varchar(2048) null
);

insert into recette (id, nom, ingredients, tps_prep, tps_cuisson, chef, citation, image,url)
values  (1, 'Accras de Butternut', '200 g de butternut, 1 oignon blanc de préférence, 1 gousse d''ail, 150g de farine, 5 g de levure, 1 oeuf, 12.5 cl de lait, 3 branches de persil plat', '01:30:00', '00:07:00', 'Philipe Etchebest', 'On croirait le Portugal alors qu''on est dans les Flandres', 'accras.jpg','https://www.marmiton.org/recettes/recette_accras-de-butternut_342606.aspx'),
        (2, 'Goulash au boeuf', '1 kg de boeuf à braiser, 400 g d''oignon, 100 g de beurre', '00:30:00', '03:00:00', 'Hélène Darose', 'Un goût si unique...un voyage vers le Grand Est!', 'goulash.jpg','https://www.marmiton.org/recettes/recette_goulash-de-boeuf_67820.aspx'),
        (3, 'Ratatouille bolognaise en lasagne', '9 plaques de lasagnes, 50 cl de béchamel plutôt liquide, 500 g de viande hachée ou 4 steaks, 3 courgettes, 1 aubergine, 6 tomates, 2 oignons, 1 gousse d''ail', '01:00:00', '00:30:00', 'Marc Veyrat', 'Bellissima! L''Italie, la méditerranée et tout les délices du sud en bouche...', 'lasagnes.jpg','https://www.marmiton.org/recettes/recette_ratatouille-bolognaise-en-lasagne_229348.aspx');