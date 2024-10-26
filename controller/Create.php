<?php
require_once "../model/Create.php";
require_once "../model/Fetch.php";
function createUserFicha($name)
{
    createUser($name);
    $user_id = getUserId($name);
    createFicha($user_id);
    $ficha_id = getFichaId($user_id);

    for ($i = 1; $i < 19; $i++) {
        createItem($i, $ficha_id);
    }
    for ($i = 1; $i < 16; $i++) {
        createPerkLink($i, $ficha_id);
    }
    for ($i = 1; $i < 6; $i++) {
        createMagic($i, $ficha_id);
    }
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    $_SESSION['user_id'] = $user_id;

    header("Location: /ficha");
}
