<?php
require "../model/Fetch.php";

function getUsersNames()
{
    return getUsers();
}
function login($name)
{
    $user_id = getUserId($name);
    if ($user_id != null) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION['user_id'] = $user_id;
        header("Location: /ficha");
    }
}
