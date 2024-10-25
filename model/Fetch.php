<?php
require_once "../model/Connection.php";
function getUsers()
{
    $stmt = connect()->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getUserId($name)
{
    $stmt = connect()->prepare("SELECT id FROM users WHERE username = :username");
    $stmt->bindParam(':username', $name);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id'];
}

function getFicha($user_id)
{
    $stmt = connect()->prepare("SELECT * FROM fichas WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getFichaId($user_id)
{
    $stmt = connect()->prepare("SELECT id FROM fichas WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id'];
}
function getPerks()
{
    $stmt = connect()->prepare("SELECT * FROM perks");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getPerkId($code_name)
{
    $stmt = connect()->prepare("SELECT id FROM perks WHERE code_name = :code_name");
    $stmt->bindParam(':code_name', $code_name);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id'];
}
function getFichaPerks($ficha_id)
{
    $stmt = connect()->prepare("SELECT perks.name, perks.code_name, perks.description
                                FROM perks
                                INNER JOIN fichas_perks_link AS fpl ON perks.id = fpl.perk_id 
                                INNER JOIN fichas ON fpl.ficha_id = fichas.id
                                WHERE fichas.id = :ficha_id");
    $stmt->bindParam(':ficha_id', $ficha_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getFichaMagics($ficha_id)
{
    $stmt = connect()->prepare("SELECT magic_slot, description FROM magics WHERE ficha_id = :ficha_id");
    $stmt->bindParam(':ficha_id', $ficha_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getFichaItens($ficha_id)
{
    $stmt = connect()->prepare("SELECT item_slot, name, qtd, peso FROM fichas_itens WHERE ficha_id = :ficha_id");
    $stmt->bindParam(':ficha_id', $ficha_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
