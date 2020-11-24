<div class="list-container">
    <?php 
        foreach ($data as $key => $value) {
            // if ($key === 0 || !$data[$key]["id_medico"] === $data[$key - 1]["id"] ) {
                $horariosArr = explode(",", $value["data_horarios"]);
    ?>
        <div class="list-container__doctor">
            <div class="list-container__header-container">
                <h2 class="list-container__doctor-name"><?php echo $value["nome"] ?></h2>
                <button class="list-container__btn">Editar cadastro</button>
                <button class="list-container__btn">Configurar horários</button>
            </div>
            <ul class="list-container__ul">
                <?php 
                    foreach ($horariosArr as $key2 => $value2) {
                        echo '<li>'.$value2.'</li>';
                    }
                ?>
            </ul>
        </div>
    <?php
            // }
        }
    ?>
</div>