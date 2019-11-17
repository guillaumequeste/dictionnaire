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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div class="form">
        <form action="" method="post">
            <input type="text" name="search" placeholder="Rechercher un mot" class="input_search" />
            <input type="submit" value="OK" name="btn_search"><?php if (!empty($_POST['btn_search'])): ?><span class="search">cheval</span><?php endif ?>
        </form>
    </div>

    <?php if (!empty($_POST['btn_search'])): ?>

    <div class="container">
        <div class="definitions" data-aos="fade-right">
            <h5 class="title">Définitions</h5>
            <ul>
                <li>dcrrvfgbb:gf blksgnfmlbnsgmlbl msglbksfk: gnb:kjfgkb nfgkjb nkfsnbkjs</li>
                <li>fvvfveerv</li>
                <li>ezvzver er erv zev ztb </li>
            </ul>
        </div>
        <div class="citations" data-aos="fade-left">
            <h5 class="title">Citations</h5>
            <ul>
                <li>dbdsfb</li>
                <li>qfvqf</li>
                <li>dbdsfb</li>
                <li>qfvqf</li>
                <li>dbdsfb</li>
            </ul>
        </div>
    </div>
    <div class="expressions" data-aos="fade-up" data-aos-duration="500">
    <h5 class="title">Expressions</h5>
       <ul>
           <li>fv fv fv fv </li>
           <li>fv fv fv fv </li>
           <li>fv fv fv fv </li>
           <li>fv fv fv fv </li>
           <li>fv fv fv fv </li>
       </ul>
    </div>
    <div class="synonymes" data-aos="fade-up" data-aos-duration="1000">
        <h5 class="title">Synonymes</h5>
        <ul class="ul_synonymes">
           <li class="li_synonymes">fv fv fv fv </li>
           <li class="li_synonymes">fv fv fv fv </li>
           <li class="li_synonymes">fv fv fv fv </li>
           <li class="li_synonymes">fv fv fv fv </li>
           <li class="li_synonymes">fv fv fv fv </li>
       </ul>
    </div>

    <div class="lienAPI">
        <p>Utilisation de l'API <a href="https://www.dicolink.com/">Dicolink</a></p>
    </div>

    <?php else :?>

    <h1>else</h1>

    <?php endif ?>

   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script>
        AOS.init();
    </script>
</body>

</html>