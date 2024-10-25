<?php
require_once '../model/Fetch.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


function compilateFichaData()
{
    $fichaData = getFicha($_SESSION['user_id'])[0];
    $fichaData['perks'] = getFichaPerks($_SESSION['ficha_id']);
    $fichaData['magics'] = getFichaMagics($_SESSION['ficha_id']);
    $fichaData['itens'] = getFichaItens($_SESSION['ficha_id']);
    return $fichaData;
}
