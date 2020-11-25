<div class="list-container">
    <?php 
        foreach ($data as $key => $value) {
            // if ($key === 0 || !$data[$key]["id_medico"] === $data[$key - 1]["id"] ) {
                $horariosArr = explode(";", $value["data_horarios"]);
    ?>
        <div class="list-container__doctor">
            <div class="list-container__header-container">
                <h2 class="list-container__doctor-name"><?php echo $value["nome"] ?></h2>
                <button class="list-container__btn">
                    <a href="<?php echo URL.'medico/editar/'.$value["id_medico"] ?>">Editar cadastro</a>
                </button>
                <button class="list-container__btn list-container__btn--last">
                    <a href="<?php echo URL.'medico/'.$value["id_medico"].'/horarios/editar' ?>">Configurar horários</a>
                </button>
            </div>
            <ul class="list-container__ul">
                <?php 
                    foreach ($horariosArr as $key2 => $value2) {
                        $horarioArr = explode(",", $value2);
                ?>
                        <li class="<?php echo $horarioArr[2] == 1 ? 'li-show' : 'li-hidden'; ?>" >
                            <a href="<?php echo URL.'medico/agendar/'.$horarioArr[0] ?>">
                                <?php echo $horarioArr[1] ?>
                            </a>
                        </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    <?php
            // }
        }
    ?>
</div>