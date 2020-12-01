<html>
    <head>
        <title>Consulta de médicos</title>

        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/variables.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/navbar.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/layout.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/horaries.css">

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
        <?php if ( isset($err) ) echo $err; ?>
        <div class="div-container">
            <form class="div-container__form" method="POST" action="<?php echo URL.'medico/horary/'.$data["id"] ?>">

                <h1 class="div-container__form-title">Adicionar horários</h1>
                <div class="div-container__name-container">
                    <span>Nome:</span>
                    <h2><?php echo $data["nome"] ?></h2>
                </div>

                <label for="date">Data</label><span> e </span> <label for="hour">hora</label>

                <div class="div-coontainer__inputs-wrapper">
                    <input class="div-container__form-datepicker" name="datepicker" placeholder="dd-mm-yyyy" id="datepicker" type="text" />
                    <input class="div-container__form-hour" name="hour" id="hour" placeholder="hh:mm" type="time" />
                </div>

                <div class="div-container__form-actions">
                    <button class="div-container__submit" type="submit">Adicionar horário</button>
                    <a href="<?php echo URL.'medico'?>">Voltar para a Página inicial</a>
                </div>
            </form> 

            <div class="div-container__horaries">
                <h1 class="div-container__horaries-title">Horários configurados</h1>
                <ul>
                        <?php
                            $horariesArr = explode(";", $data["data_horarios"]);
                            foreach ($horariesArr as $key => $value) {
                            $horaryArr = explode(",", $value);
                            if (count($horaryArr) > 1) {
                        ?>

                                <li class='div-container__horary'>
                                    <?php echo $horaryArr[1] ?>
                                    <?php
                                        if ($horaryArr[2] == 0) {
                                    ?>    
                                        <a class="div-container__horaries-remove" href="<?php echo URL."medico/horary_delete/".$horaryArr[0];?>">Remover</a>
                                    <?php
                                        }
                                    ?>
                                </li>

                    <?php
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>

</html>

  