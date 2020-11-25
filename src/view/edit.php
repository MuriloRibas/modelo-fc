<div>
    <?php if ( isset($err) ) echo $err; ?>

    <form method="POST" action="<?php echo URL.'medico/edit/'.$data["id"] ?>">
        <label for="nome">Nome</label>
        <input type="text" name="name" id="name" value="<?php echo $data["nome"] ?>">
        <label for="last_pass">Senha antiga</label>
        <input type="password" name="last_pass" id="last_pass" value="">

        <label for="new_pass">Nova senha</label>
        <input type="password" name="new_pass" id="new_pass" value="" pattern="\w{6,}">

        <button type="submit">Atualizar cadastro</button>
        <a href="#">Voltar para a Página inicial</a>
    </form> 
</div>