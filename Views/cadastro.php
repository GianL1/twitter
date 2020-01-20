<h2>Tela de Cadastro</h2>

<form action="" method="post">

    Nome: <br>
    <input type="text" name="nome" id=""> <br><br>

    Email: <br>
    <input type="email" name="email" id=""><br><br>

    Senha: <br>
    <input type="password" name="senha" id=""><br><br>

    

    <button type="submit">Cadastrar</button>
</form>

<?php
    if(!empty($aviso)) {
        echo $aviso;
    }
?>
