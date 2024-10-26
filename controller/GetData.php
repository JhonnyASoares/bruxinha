<?php
require_once '../model/Fetch.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function compilateFichaData()
{
    $fichaData = getFicha($_SESSION['user_id'])[0];
    $fichaData['perks'] = getFichaPerks($fichaData['id']);
    $fichaData['magics'] = getFichaMagics($fichaData['id']);
    $itensList = [];
    foreach (getFichaItens($fichaData['id']) as $key => $value) {
        $itensList[] = [
            'item_slot' => $value['item_slot'],
            'name' => $value['name'],
            'qtd' => $value['qtd'] / 10,
            'peso' => $value['peso'] / 10,
        ];
    }
    $fichaData['itens'] = $itensList;
    return $fichaData;
}
