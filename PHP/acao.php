<?php
    //Verifica se há a informação de acao
    if (isset($_POST['acao'])):
        //Switch-case com as informações que podem vir de acao
        switch($_POST['acao']):
            case "Criar":
                echo '<p>Criando jogo</p>';
                //Traz o formulário
                require_once('formulario.php');
                break;
            case "Carregar jogo":
                echo '<p>Carregar jogo</p>';
                echo '<p>
                        <form action="" method="post">
                        Id: <input type="text" name="id">
                        <input type="submit" value="Carregar" name="enviar">
                        </form>
                      </p>';
                break;
            case "Carregar todos":
                //Carrega o JodoDAO(CRUD)
                require_once('JogoDAO.php');
                //Cria array de Jogo a partir da função Carregar todos
                $todos = CarregarTodos();
                echo '<p>Todos os jogos</p>';
                //Foreach para printar os ids e nomes dos jogos
                foreach($todos as $i):
                    echo '<p>'.$i -> getId().'. '.$i -> getNome();
                endforeach;
                break;
            case "Atualizar":
                echo '<p>Atualizar jogo</p>';
                echo '<p>
                        <form action="" method="post">
                        Id: <input type="text" name="id">
                        <input type="submit" value="Verificar" name="enviar">
                        </form>
                      </p>';
                break;
            case "Excluir":
                echo '<p>Excluir jogo</p>';
                echo '<p>
                        <form action="" method="post">
                        Id: <input type="text" name="id">
                        <input type="submit" value="Excluir" name="enviar">
                        </form>
                      </p>';
                break;
            default:
                break;
        endswitch;
    endif;
?>