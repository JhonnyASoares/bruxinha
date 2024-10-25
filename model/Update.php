<?php
require_once "../model/Connection.php";
function updateItens($ficha_id, $item_slot, $name, $qtd, $peso)
{
    $stmt = connect()->prepare("UPDATE fichas_itens SET name = :name, qtd = :qtd, peso = :peso WHERE (ficha_id = :ficha_id) AND (item_slot = :item_slot)");
    $stmt->bindParam(':item_slot', $item_slot);
    $stmt->bindParam(':ficha_id', $ficha_id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':qtd', $qtd);
    $stmt->bindParam(':peso', $peso);
    $stmt->execute();
}
function updateCab($ficha_id, $name, $genero, $etinia, $origem, $antecedentes, $classe, $arcana, $implemento)
{
    $stmt = connect()->prepare("UPDATE fichas SET name = :name, genero = :genero, etinia = :etinia, origem = :origem, antecedentes = :antecedentes, classe = :classe, arcana = :arcana, implemento = :implemento WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':etinia', $etinia);
    $stmt->bindParam(':origem', $origem);
    $stmt->bindParam(':antecedentes', $antecedentes);
    $stmt->bindParam(':classe', $classe);
    $stmt->bindParam(':arcana', $arcana);
    $stmt->bindParam(':implemento', $implemento);
    $stmt->bindParam(':id', $ficha_id);
    $stmt->execute();
}
function updateAtributes($ficha_id, $column, $value)
{
    $stmt = connect()->prepare("UPDATE fichas SET $column = :value WHERE id = :ficha_id");
    //$stmt->bindParam(':column', $column);
    $stmt->bindParam(':value', $value);
    $stmt->bindParam(':ficha_id', $ficha_id);
    $stmt->execute();
}
function updatePerkLink($ficha_id, $perk_id, $perk_slot)
{
    $stmt = connect()->prepare("UPDATE fichas_perks_link SET perk_id = :perk_id WHERE (ficha_id = :ficha_id) AND (perk_slot = :perk_slot)");
    $stmt->bindParam(':perk_slot', $perk_slot);
    $stmt->bindParam(':ficha_id', $ficha_id);
    $stmt->bindParam(':perk_id', $perk_id);
    $stmt->execute();
}
function updateMagic($ficha_id, $magic_slot, $description)
{
    $stmt = connect()->prepare("UPDATE magics SET description = :description WHERE (ficha_id = :ficha_id) AND (magic_slot = :magic_slot)");
    $stmt->bindParam(':magic_slot', $magic_slot);
    $stmt->bindParam(':ficha_id', $ficha_id);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
}
function updateLifeEqu($ficha_id, $vida, $equilibrio)
{
    $stmt = connect()->prepare("UPDATE fichas SET vida = :vida, equilibrio = :equilibrio WHERE id = :ficha_id");
    $stmt->bindParam(':vida', $vida);
    $stmt->bindParam(':equilibrio', $equilibrio);
    $stmt->bindParam(':ficha_id', $ficha_id);
    $stmt->execute();
}
