<?php
require_once "../model/Connection.php";
function createItem($item_slot, $ficha_id)
{
    $stmt = connect()->prepare("INSERT INTO fichas_itens (item_slot, ficha_id) VALUES (:item_slot, :ficha_id)");
    $stmt->bindParam(':item_slot', $item_slot);
    $stmt->bindParam(':ficha_id', $ficha_id);
    $stmt->execute();
}

function createUser($username)
{
    $stmt = connect()->prepare("INSERT INTO users (username) VALUES (:username)");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
}
function createFicha($user_id)
{
    $stmt = connect()->prepare("INSERT INTO fichas (user_id) VALUES (:user_id)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
}
function createPerkLink($perk_slot, $ficha_id)
{
    $stmt = connect()->prepare("INSERT INTO fichas_perks_link (perk_slot, ficha_id) VALUES (:perk_slot, :ficha_id)");
    $stmt->bindParam(':perk_slot', $perk_slot);
    $stmt->bindParam(':ficha_id', $ficha_id);
    $stmt->execute();
}

function createMagic($magic_slot, $ficha_id)
{
    $stmt = connect()->prepare("INSERT INTO magics (magic_slot, ficha_id) VALUES (:magic_slot, :ficha_id)");
    $stmt->bindParam(':magic_slot', $magic_slot);
    $stmt->bindParam(':ficha_id', $ficha_id);
    $stmt->execute();
}
