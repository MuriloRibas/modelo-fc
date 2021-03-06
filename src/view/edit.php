<div>
    <?php if ( isset($err) ) echo $err; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/variables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/edit.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>model/css/layout.css">

    <button class="nav-container__button--sandwich">
        <i class="fas fa-bars"></i>
    </button>
    <nav class="nav-container">
        <div class="nav-container__content-container">
            <button class="nav-container__button-primary"><a class="nav-container__button-primary-a" href="<?php echo URL.'medico/criar' ?>">Cadastro de médico</a></button>
        </div>
    </nav>

    <div class="layout-container">
        <form class="form-container" method="POST" action="<?php echo URL.'medico/edit/'.$data["id"] ?>">
            <h1 class="form-container__title">Editar médico</h1>
            <div class="form-container__div-all-inputs">
                <div class="form-container__div-inputs">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" value="<?php echo $data["nome"] ?>">
                </div> 
                <div class="form-container__div-inputs">
                    <label for="last_pass">Senha antiga</label>
                    <input type="password" name="last_pass" id="last_pass" value="" placeholder="Insira a senha antiga">
                </div> 
                <div class="form-container__div-inputs">
                    <label for="new_pass">Nova senha</label>
                    <input type="password" name="new_pass" id="new_pass" value="" pattern="\w{6,}" placeholder="Escolha uma nova senha forte e segura">
                </div> 

            </div>

            <div class="form-container__div-actions">
                <button class="form-container__submit" type="submit">Atualizar cadastro</button>
                <a href="<?php echo URL.'medico'?>">Voltar para a Página inicial</a>
            </div>
        </form> 
    </div>
</div>