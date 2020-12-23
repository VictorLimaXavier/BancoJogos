<?php
    //Trás o script do objeto Jogo
    require_once('Jogo.php');
    //Verifica se há a informação de enviar
    if (isset($_POST['enviar'])):
        //Switch-case com as informações que podem vir de enviar
        switch($_POST['enviar']):
            case "Criar":
                //Cria um objeto do tipo Jogo
                $jogo = new Jogo($_POST['nome'], $_POST['genero'], $_POST['ano']);
                if (isset($_POST['tenho'])) $jogo -> setTenho(true);
                if (isset($_POST['favorito'])) $jogo -> setFavorito(true);

                require_once('JogoDAO.php');
                //Cria um jogo no banco
                Criar($jogo);
                break;
            case "Carregar":
                require_once('JogoDAO.php');
                //Carrega um jogo do banco de acordo com o id passado
                $jogo = Carregar($_POST['id']);
                //Cria um texo para exibição
                $texto = '<p>'.$jogo -> getId().'. '.$jogo -> getNome().'</p>
                           <p>Gênero: '.$jogo -> getGenero().'</p>
                           <p>Ano: '.$jogo -> getAno().'</p><p>Tenho: ';
                $texto = ((bool)$jogo -> getTenho()) ? $texto.'Sim' : $texto.'Não';
                $texto = $texto.'</p><p>Favorito: ';
                $texto = ((bool)$jogo -> getFavorito()) ? $texto.'Sim' : $texto.'Não';
                $texto = $texto.'</p>';
                //Exibe o texto
                echo $texto;
                break;
            case "Verificar":
                require_once('JogoDAO.php');
                //Carrega um jogo do banco de acordo com o id passado
                $jogo = Carregar($_POST['id']);
                //Verifica se tem um jogo e trás o formulario com os dados
                if(isset($jogo)) require_once('formulario.php');
                break;
            case "Atualizar":
                //Cria um objeto do tipo Jogo com as informações passadas
                $jogo = new Jogo($_POST['nome'], $_POST['genero'], $_POST['ano']);
                if (isset($_POST['tenho'])) $jogo -> setTenho(true);
                if (isset($_POST['favorito'])) $jogo -> setFavorito(true);
                $jogo -> setId($_POST['id']);

                require_once('JogoDAO.php');
                //Atualiza o jogo com o id do $jogo que foi criado
                Atualizar($jogo);
                break;
            case "Excluir":
                require_once('JogoDAO.php');
                //Deleta a partir do id passado
                Deletar($_POST['id']);
                break;
            default:
                break;
        endswitch;
    endif;
?>