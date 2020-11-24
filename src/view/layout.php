<html>
    <head>
        <title>Consulta de médicos</title>

        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/variables.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/layout.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/list.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/navbar.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT;?>vendor/components/font-awesome/css/all.css">

        <script src="<?php echo URL_ROOT;?>vendor/components/jquery/jquery.min.js"></script>
        <script src="<?php echo URL;?>model/css/js/index.js"></script>

    </head>

    <button class="nav-container__button--sandwich">
        <i class="fas fa-bars"></i>
    </button>
    <nav class="nav-container">
        <div class="nav-container__content-container">
            <button class="nav-container__button-primary">Cadastro de médico</button>
        </div>
    </nav>

    <div class="layout-container">
    <?php
        include "../src/view/index.php";
    ?>
    
    <?php /*
        * É recomendado que todo o carregamente seja feito apartir desse arquivo.
        */
    ?>

</html>