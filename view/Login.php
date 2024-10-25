<?php
require "../controller/Login.php";
if (isset($_POST['submit'])) {
    login($_POST["name"]);
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
            <h2>Loga baixinho pros cria</h2>

            <form method="post">
                <div class="inputs">
                    <div>
                        <label for="name">Só crica ai</label>
                        <select name="name" id="name" onclick="getNames(this)">
                            <option value=""></option>
                            <?php
                            foreach (getUsersNames() as $userData) {
                                echo "<option value='{$userData['username']}'>{$userData['username']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit">Logar</button>
            </form>
            <span class="click-here">Para criar uma ficha <a href="Create.php">Clique aqui.</a></span>
        </div>

    </section>

    <script src="../assets/js/login.js"></script>
</body>

</html>