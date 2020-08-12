<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue and PHP</title>

    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="<?= url(ASSETS . "bootstrap/css/bootstrap.min.css") ?>">
    
    <script src="<?= url(ASSETS . "js/vue.js") ?>"></script>
    <script src="<?= url(ASSETS . "js/font-awesome.js") ?>"></script>
    <script src="<?= url(ASSETS . "js/jquery-3.5.1.min.js") ?>"></script>
    <script src="<?= url(ASSETS . "js/axios.min.js") ?>"></script>
    
    <!-- ANIMAÇÕES -->
    <link rel="stylesheet" href="<?= url(ASSETS . "css/animate.min.css") ?>">
    
    <!-- MEU ESTILO -->
    
    <link rel="stylesheet" href="<?= url(CSS . "style.css") ?>">
</head>
<body>

    <header></header>

    <div id="app">
        <?= $v->section('content') ?>     
    </div>
    
    <?= $v->section('script') ?>
</body>
</html>