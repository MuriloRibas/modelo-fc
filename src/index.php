<html>
    <head>
        <title>Document</title>

        <link rel="stylesheet" href="../vendor/components/font-awesome/css/all.css">
        <link rel="stylesheet" href="./styles/reset.css">
        <link rel="stylesheet" href="./styles/variables.css">
        <link rel="stylesheet" href="./styles/list.css">

        <link rel="stylesheet" href="./styles/navbar.css">

        <script src="../vendor/components/jquery/jquery.min.js"></script>
        <script src="./test.js"></script>

    </head>

    <button class="nav-container__button--sandwich">
        <i class="fas fa-bars"></i>
    </button>
    <nav class="nav-container">
        <div class="nav-container__content-container">
            <button class="nav-container__button-primary">Cadastro de médico</button>
        </div>
    </nav>

    <?php
        include "./view/index.html";
    ?>
    
    <?php /*
        * É recomendado que todo o carregamente seja feito apartir desse arquivo.
        */
    ?>

</html>