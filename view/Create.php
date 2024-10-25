<?php
require "../controller/Create.php";
if (isset($_POST['submit'])) {
    createUserFicha($_POST["username"]);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>BRUXINHAAAAA</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>

<body>
    <section class="container">
        <div class="main">
            <h2 style="font-size: 25px;">Faz a ficha lentinho pros cria</h2>

            <form method="post">
                <div class="inputs">
                    <div>
                        <label for="username">Só botar o nome</label>
                        <input type="text" name="username" id="username">
                    </div>
                </div>
                <button name="submit">Criar</button>
            </form>
            <span class="click-here">Para voltar pro login <a href="Login.php">Clique aqui.</a></span>
        </div>

    </section>

</body>

</html>