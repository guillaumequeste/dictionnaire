<?php
$definitions = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/definitions?limite=200&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_definitions = file_get_contents($definitions);
$data_definitions = json_decode($data_definitions);
$def = $data_definitions;

$citations = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/citations?limite=5&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_citations = file_get_contents($citations);
$data_citations = json_decode($data_citations);
$cit = $data_citations;

$expressions = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/expressions?limite=5&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_expressions = file_get_contents($expressions);
$data_expressions = json_decode($data_expressions);
$exp = $data_expressions;

$synonymes = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/synonymes?limite=5&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_synonymes = file_get_contents($synonymes);
$data_synonymes = json_decode($data_synonymes);
$syn = $data_synonymes;

$antonymes = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/antonymes?limite=5&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_antonymes = file_get_contents($antonymes);
$data_antonymes = json_decode($data_antonymes);
$ant = $data_antonymes;

$scorescrabble = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/scorescrabble?limite=5&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_scorescrabble = file_get_contents($scorescrabble);
$data_scorescrabble = json_decode($data_scorescrabble);
$ssc = $data_scorescrabble;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dictionnaire</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form">
        <form action="" method="post">
            <input type="text" name="search" placeholder="Rechercher un mot" />
            <input type="submit" value="OK" name="btn_search">
        </form>
    </div>

    <?php if (!empty($_POST['btn_search'])): ?>

    <div class="container">
        <div class="definitions">
            <h5 class="title">Définitions</h5>
            <?php foreach ($def as $d) :?>
                <ul>
                    <li><?= $d->definition; ?></li>
                </ul>
            <?php endforeach ?>
        </div>
        <div class="citations">
            <h5 class="title">Citations</h5>
            <?php foreach ($cit as $c) :?>
                <ul>
                    <li><?= $c->citation ?> - <?= $c->auteur ?></li>
                </ul>
            <?php endforeach ?>
        </div>
    </div>
    <div class="expressions">
        <h5 class="title">Expressions</h5>
        <?php foreach ($exp as $e) :?>
            <ul>
                <li><?= $e->expression; ?> - <?= $e->semantique ?></li>
            </ul>
        <?php endforeach ?>
    </div>
    <div class="container2">
        <div class="synonymes">
            <h5 class="title2">Synonymes</h5>
            <?php foreach ($syn as $s) :?>
                <a href="<?php $s->dicolinkUrl ?>"><?= $s->mot ?></a>
            <?php endforeach ?>
        </div>
        <div class="antonymes">
            <h5 class="title2">Antonymes</h5>
            <?php foreach ($ant as $a) :?>
                <a href="<?php $s->dicolinkUrl ?>"><?= $a->mot ?></a>
            <?php endforeach ?>
        </div>
        <div class="score">
            <h5 class="title2">Score au scrabble</h5>
            <?= $ssc->score ?>
        </div>
    </div>

    <?php endif ?>
</body>

</html>