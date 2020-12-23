<form action="" method="post">
    <input type="hidden" name="id" value="<?php if(isset($jogo)) echo $jogo -> getId()?>">
    <?php if(isset($jogo)) echo '<p>Id: '.$jogo -> getId().'</p>'?>
    <p>Nome: <input type="text" value="<?php if(isset($jogo)) echo $jogo -> getNome()?>" name="nome"></p>
    <p>Gênero: <input type="text" value="<?php if(isset($jogo)) echo $jogo -> getGenero()?>" name="genero"></p>
    <p>Ano: <input type="text" value="<?php if(isset($jogo)) echo $jogo -> getAno()?>" name="ano"></p>
    <p>
        <input type="checkbox" name="tenho" <?php if(isset($jogo) && $jogo -> getTenho()) echo "checked"?>> Tenho
        <input type="checkbox" name="favorito" <?php if(isset($jogo) && $jogo -> getFavorito()) echo "checked"?>> Favorito
    </p>
    <?php
        if(isset($_POST['enviar'])):
            echo '<p><input type="submit" value="Atualizar" name="enviar"></p>';
        else:
            echo '<p><input type="submit" value="Criar" name="enviar"></p>';
        endif;
    ?>
</form>