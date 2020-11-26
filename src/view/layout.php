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

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <button class="nav-container__button--sandwich">
        <i class="fas fa-bars"></i>
    </button>
    <nav class="nav-container">
        <div class="nav-container__content-container">
            <button class="nav-container__button-primary"><a class="nav-container__button-primary-a" href="<?php echo URL.'medico/criar' ?>">Cadastro de médico</a></button>
        </div>
    </nav>
    <div class="layout-container">
    
    <?php
        include "../src/view/index.php";
    ?>

</html>