<html>
<head>
<meta charset = "UTF-8">
<title>Home</title>
</head>
<body>
    <form action = "" method = "post">
        <p>
            <input type = "submit" value = "Criar" name = "acao">
            <input type = "submit" value = "Carregar jogo" name = "acao">
            <input type = "submit" value = "Carregar todos" name = "acao">
            <input type = "submit" value = "Atualizar" name = "acao">
            <input type = "submit" value = "Excluir" name = "acao">
        </p>
    </form>
<?php
    require('enviar.php');
    require('acao.php');
?>
</body>
</html>