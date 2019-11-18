<?php
function curl_get_file_contents($URL){
    $c = curl_init();
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_URL, $URL);
    $contents = curl_exec($c);
    curl_close($c);

    if ($contents) return $contents;
    else return FALSE;
}

$definitions = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/definitions?limite=200&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_definitions = curl_get_file_contents($definitions);
$data_definitions = json_decode($data_definitions);
$def = $data_definitions;

$citations = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/citations?limite=5&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_citations = curl_get_file_contents($citations);
$data_citations = json_decode($data_citations);
$cit = $data_citations;

$expressions = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/expressions?limite=5&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_expressions = curl_get_file_contents($expressions);
$data_expressions = json_decode($data_expressions);
$exp = $data_expressions;

$synonymes = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/synonymes?limite=5&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_synonymes = curl_get_file_contents($synonymes);
$data_synonymes = json_decode($data_synonymes);
$syn = $data_synonymes;

$antonymes = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/antonymes?limite=5&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_antonymes = curl_get_file_contents($antonymes);
$data_antonymes = json_decode($data_antonymes);
$ant = $data_antonymes;

$scorescrabble = 'https://api.dicolink.com/v1/mot/'.$_POST["search"].'/scorescrabble?limite=5&api_key=F49u6WGSR1N4WV_w4Tb9vva_ENf2gc1I';
$data_scorescrabble = curl_get_file_contents($scorescrabble);
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div class="form">
        <form action="" method="post">
            <input type="text" name="search" placeholder="Rechercher un mot" class="input_search" />
            <input type="submit" value="OK" name="btn_search"><?php if (!empty($_POST['search'])): ?><div class="search"><?= $_POST['search'] ?></div><?php endif ?>
        </form>
    </div>

    <?php if (empty($_POST['search'])): ?>

    <?php else: ?>

    <div class="container">
        <div class="definitions" data-aos="fade-right">
            <h5 class="title">Définitions</h5>
            <?php foreach ($def as $d) :?>
                <ul>
                    <li><?= $d->definition; ?></li>
                </ul>
            <?php endforeach ?>
        </div>
        <div class="citations" data-aos="fade-left">
            <h5 class="title">Citations</h5>
            <?php foreach ($cit as $c) :?>
                <ul>
                    <li><?= $c->citation ?> - <?= $c->auteur ?></li>
                </ul>
            <?php endforeach ?>
        </div>
    </div>
    <div class="expressions" data-aos="fade-up" data-aos-duration="500">
    <h5 class="title">Expressions</h5>
    <?php foreach ($exp as $e) :?>
            <ul>
                <li><?= $e->expression; ?> - <?= $e->semantique ?></li>
            </ul>
        <?php endforeach ?>
    </div>
    <div class="synonymes" data-aos="fade-up" data-aos-duration="1000">
        <h5 class="title">Synonymes</h5>
        <?php foreach ($syn as $s) :?>
                <?= $s->mot ?>
            <?php endforeach ?>
    </div>

    <div class="lienAPI">
        <p>Utilisation de l'API <a href="https://www.dicolink.com/" target="_blank">Dicolink</a></p>
    </div>
    
    <?php endif ?>

   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script>
        AOS.init();
    </script>
</body>

</html>