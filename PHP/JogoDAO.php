<?php
  //Trás o script do objeto Jogo
  require_once('Jogo.php');

  //Função para conectar com o banco
  function Conectar(){
    $servername = "localhost";
    $username = "user";
    $password = "password";
    $myDB = "game";

    // Cria conecção
    $conn = new mysqli($servername, $username, $password, $myDB);
    // Testa a conecção
    if ($conn->connect_error) {
      die("Connection failed: " . $conn -> connect_error);
    }

    return $conn;
  }

  function Criar($jogo){
      //Cria a conexão
      $conn = Conectar();

      //Script para inserir
      $sql = "INSERT INTO jogos VALUES (0, '".$jogo -> getNome()."', '".$jogo -> getGenero()."', ".$jogo -> getAno().", ".(int)$jogo -> getTenho().", ".(int)$jogo -> getFavorito().")";

      //Teste de erro
      if ($conn->query($sql) === TRUE) {
        echo "Cadastrado com sucesso";
      } else {
        echo "Error: $sql<br>" . $conn -> error;
      }

      //Fecha a conecção
      $conn->close();
  }

  function CarregarTodos(){
    $conn = Conectar();

    //Script para carregar todos os jogos do banco
    $sql = "SELECT * FROM jogos";

    //Teste de erro
    $result_query = $conn -> query($sql, MYSQLI_USE_RESULT) or die('Erro:'.$sql.' '.$conn -> error);
    
    //Cria um array com os dados do banco
    $ar = $result_query -> fetch_all(MYSQLI_ASSOC);

    //Transforma o array retirado do banco em um array de objeto do tipo Jogo
    $todos = array();
    foreach($ar as $i):
      $jogo = new Jogo($i['nome'], $i['genero'], $i['ano'], $i['tenho'], $i['favorito'], $i['id']);
      array_push($todos, $jogo);
    endforeach;

    $conn -> close();
    return $todos;
  }

  function Carregar($id){
    $conn = Conectar();

    //Script para carregar o jogo com o id
    $sql = "SELECT * FROM jogos WHERE id = $id";

    $result_query = $conn -> query($sql, MYSQLI_USE_RESULT) or die('Erro:'.$sql.' '.$conn -> error);

    //Cria um array com os dados do jogo
    $i = $result_query -> fetch_array(MYSQLI_ASSOC);

    //Cria um objeto do tipo Jogo a partir do array $i
    $jogo = new Jogo($i['nome'], $i['genero'], $i['ano'], $i['tenho'], $i['favorito'], $i['id']);

    $conn -> close();
    return $jogo;
  }

  function Atualizar($jogo){
    $conn = Conectar();

    //Script para atualizar o jogo a partir do id informado
    $sql = "UPDATE jogos SET nome='".$jogo -> getNome()."', genero='".$jogo -> getGenero()."', ano=".$jogo -> getAno().", tenho=".(int)$jogo -> getTenho().", favorito=".(int)$jogo -> getFavorito()." WHERE id =".$jogo -> getId();

    if ($conn->query($sql) === TRUE) {
      echo "Atualizado com sucesso";
    } else {
      echo "Error: $sql<br>" . $conn -> error;
    }

    $conn->close();
  }

  function Deletar($id){
    $conn = Conectar();

    //Script para deletar um jogo de acordo com o id
    $sql = "DELETE FROM jogos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      echo "Deletado com sucesso";
    } else {
      echo "Error: $sql<br>" . $conn -> error;
    }

    $conn->close();
  }
?>