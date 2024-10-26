<?php
require_once "../model/Update.php";
require_once "../model/Fetch.php";
header('Content-Type: application/json; charset=utf-8');
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$jsonData = json_decode(file_get_contents('php://input'));
if (isset($jsonData->get_perks)) {
    echo json_encode(getPerks());
}
if (isset($_POST['item'])) {
    upItens();
}
if (isset($_POST['name'])) {
    updateCab($_POST['ficha_id'], $_POST['name'], $_POST['genero'], $_POST['etinia'], $_POST['origem'], $_POST['antecedentes'], $_POST['classe'], $_POST['arcana'], $_POST['implemento']);
}
if (isset($_POST['vital'])) {
    upAtribute();
}
if (isset($_POST['prk'])) {
    upPerkLink();
}
if (isset($_POST['magia'])) {
    upMagic();
}
if (isset($_POST['vida'])) {
    updateLifeEqu($_POST['ficha_id'], $_POST['vida'], $_POST['equilibrio']);
}

function upItens()
{
    foreach ($_POST['item'] as $key => $name) {
        $qtd = $_POST['quantidade'][$key];
        $peso = $_POST['peso'][$key];
        if ($qtd == null) {
            $qtd = 0;
        }
        if ($peso == null) {
            $peso = 0;
        }
        $qtd *= 10;
        $peso *= 10;
        updateItens($_POST['ficha_id'], $key + 1, $name, $qtd, $peso);
    }
}
function upAtribute()
{
    foreach ($_POST as $column => $name) {
        updateAtributes($_POST['ficha_id'], $column, $name);
    }
}
function upPerkLink()
{
    foreach ($_POST['prk'] as $prkSlot => $codeName) {
        $prkId = getPerkId($codeName);
        updatePerkLink($_POST['ficha_id'], $prkId, $prkSlot + 1);
    }
}
function upMagic()
{
    foreach ($_POST['magia'] as $magicSlot => $desc) {
        updateMagic($_POST['ficha_id'], $magicSlot + 1, $desc);
    }
}
