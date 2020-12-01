<div class="list-container">
    <?php 

        foreach ($data as $key => $value) {
                $horariosArr = explode(";", $value["data_horarios"]);

    ?>
        <div class="list-container__doctor">
            <div class="list-container__header-container">
                <h2 class="list-container__doctor-name"><?php echo $value["nome"] ?></h2>
                <button class="list-container__btn">
                    <a href="<?php echo URL.'medico/editar/'.$value["id_medico"] ?>">Editar cadastro</a>
                </button>
                <button class="list-container__btn list-container__btn--last">
                    <a href="<?php echo URL.'medico/horarios/'.$value["id_medico"] ?>">Configurar horários</a>
                </button>
            </div>
            <ul class="list-container__ul">
                <?php 
                        foreach ($horariosArr as $key2 => $value2) {
                            $horarioArr = explode(",", $value2);
                            if (count($horarioArr) > 1) {
                ?>
                            <li class="<?php echo $horarioArr[2] == 0 ? 'li-show' : 'li-hidden'; ?>" >
                                <a href="<?php echo URL.'medico/agendar/'.$horarioArr[0] ?>">
                                    <?php echo $horarioArr[1] ?>
                                </a>
                            </li>
                <?php
                            }
                        }
                ?>
            </ul>
        </div>
    <?php
        }
    ?>
</div>