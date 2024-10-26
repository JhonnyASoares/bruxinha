<?php
require_once "../controller/GetData.php";
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$fichaData = compilateFichaData();
if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
}
extract($fichaData);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>BRUXINHAAAAA</title>
    <!-- <link rel="shortcut icon" href=""> -->
    <link rel="stylesheet" type="text/css" href="../assets/css/ficha.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

</head>

<body>
    <a href="/logout">Deslogar</a>
    <section>
        <input type="hidden" id="ficha_id" value="<?= $id; ?>">
        <form class="cabecario" id="cabecario">
            <div class="cab-1">
                <div class="flex-inputs">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" <?= "value='{$name}'"; ?>>
                </div>
                <div class=" genero">
                    <div>
                        <label for="macho"><i class="fa-solid fa-mars"></i></label>
                        <input type="radio" id="macho" name="genero" value="1" <?php $genero == 1 ? print('checked') : print(''); ?>>
                    </div>
                    <div>
                        <label for="femea"><i class="fa-solid fa-venus"></i></label>
                        <input type="radio" id="femea" name="genero" value="0" <?php $genero == 0 ? print('checked') : print(''); ?>>
                    </div>
                </div>
            </div>
            <div class="cab-2">
                <div class="flex-inputs">
                    <label for="etinia">Etinia</label>
                    <input type="text" name="etinia" id="etinia" <?= "value='{$etinia}'"; ?>>
                </div>
                <div class="flex-inputs">
                    <label for="origem">Origem</label>
                    <input type="text" name="origem" id="origem" <?= "value='{$origem}'"; ?>>
                </div>
                <div class="flex-inputs">
                    <label for="antecedentes">Antecedentes</label>
                    <input type="text" name="antecedentes" id="antecedentes" <?= "value='{$antecedentes}'"; ?>>
                </div>
                <div class="flex-inputs">
                    <label for="classe">Classe</label>
                    <input type="text" name="classe" id="classe" <?= "value='{$classe}'"; ?>>
                </div>
                <div class="flex-inputs">
                    <label for="arcana">Arcana</label>
                    <input type="text" name="arcana" id="arcana" <?= "value='{$arcana}'"; ?>>
                </div>
                <div class="flex-inputs">
                    <label for="implemento">Implemento</label>
                    <input type="text" name="implemento" id="implemento" <?= "value='{$implemento}'"; ?>>
                </div>
            </div>
        </form>

        <form class="atributos-container" id="atributos">
            <div class="atributo b-b">
                <div class="main-atb flex-inputs ">
                    <label for="vital">Vital</label>
                    <input type="number" onwheel="this.blur()" name="vital" id="vital" onkeyup="calcMainAtr(this)" <?= "value='{$vital}'"; ?>>
                </div>
                <div class="sec-atb-container">
                    <div class="sec-atb">
                        <label for="vitalidade">Vitalidade</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="vitalidade" id="vitalidade" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$vitalidade}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="sec-atb">
                        <label for="carga">Carga</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="carga" id="carga" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$carga}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="sec-atb">
                        <label for="resistencia">Resistência</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="resistencia" id="resistencia" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$resistencia}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="atributo b-b">
                <div class="main-atb flex-inputs ">
                    <label for="cognicao">Cognição</label>
                    <input type="number" onwheel="this.blur()" name="cognicao" id="cognicao" onkeyup="calcMainAtr(this)" <?= "value='{$cognicao}'"; ?>>
                </div>
                <div class="sec-atb-container">
                    <div class="sec-atb">
                        <label for="intuicao">Intuição</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="intuicao" id="intuicao" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$intuicao}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="sec-atb">
                        <label for="logica">Logica</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="logica" id="logica" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$logica}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="sec-atb">
                        <label for="ampli_cog">Ampliação</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="ampli_cog" id="ampli_cog" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$ampli_cog}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="atributo b-b">
                <div class="main-atb flex-inputs ">
                    <label for="compreensao">Compreensão</label>
                    <input type="number" onwheel="this.blur()" name="compreensao" id="compreensao" onkeyup="calcMainAtr(this)" <?= "value='{$compreensao}'"; ?>>
                </div>
                <div class="sec-atb-container">
                    <div class="sec-atb">
                        <label for="conhecimento">Conhecimento</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="conhecimento" id="conhecimento" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$conhecimento}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="sec-atb">
                        <label for="diplomacia">Diplomacia</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="diplomacia" id="diplomacia" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$diplomacia}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="sec-atb">
                        <label for="ampli_comp">Ampliação</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="ampli_comp" id="ampli_comp" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$ampli_comp}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="atributo b-b">
                <div class="main-atb flex-inputs ">
                    <label for="perscicacia">Perscicacia</label>
                    <input type="number" onwheel="this.blur()" name="perscicacia" id="perscicacia" onkeyup="calcMainAtr(this)" <?= "value='{$perscicacia}'"; ?>>
                </div>
                <div class="sec-atb-container">
                    <div class="sec-atb">
                        <label for="mobilidade">Mobilidade</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="mobilidade" id="mobilidade" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$mobilidade}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="sec-atb">
                        <label for="agilidade">Agilidade</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="agilidade" id="agilidade" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$agilidade}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="sec-atb">
                        <label for="ampli_persp">Ampliação</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="ampli_persp" id="ampli_persp" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$ampli_persp}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="atributo b-b">
                <div class="main-atb flex-inputs ">
                    <label for="charme">Charme</label>
                    <input type="number" onwheel="this.blur()" name="charme" id="charme" onkeyup="calcMainAtr(this)" <?= "value='{$charme}'"; ?>>
                </div>
                <div class="sec-atb-container">
                    <div class="sec-atb">
                        <label for="carisma">Carisma</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="carisma" id="carisma" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$carisma}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="sec-atb">
                        <label for="coercao">Coerção</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="coercao" id="coercao" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$coercao}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="sec-atb">
                        <label for="criatividade">Criatividade</label>
                        <div class="sec-atb-inputs">
                            <input type="number" disabled>
                            <div>
                                <input type="number" name="criatividade" id="criatividade" onwheel="this.blur()" onkeyup="calcBonus(this)" <?= "value='{$criatividade}'"; ?>>
                                <input type="number" onwheel="this.blur()" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form class="perks" id="perks">
            <label>Perks</label>
            <div>
                <select name="prk[]" id="prk_1" onclick="callPerks(this)"><?= isset($perks[0]) ? "<option value='{$perks[0]['code_name']}'>{$perks[0]['name']}</option>" : ''; ?> </select>
                <select name="prk[]" id="prk_2" onclick="callPerks(this)"><?= isset($perks[1]) ? "<option value='{$perks[1]['code_name']}'>{$perks[1]['name']}</option>" : ''; ?></select>
            </div>
            <textarea id="prk_desc_1" disabled><?= isset($perks[0]) ? $perks[0]['name'] . ': ' . $perks[0]['description'] : ''; ?></textarea>
            <textarea id="prk_desc_2" disabled><?= isset($perks[1]) ? $perks[1]['name'] . ': ' . $perks[1]['description'] : ''; ?></textarea>
        </form>

        <form class="life-container" id="life_container">
            <div>
                <label for="vida">Vida</label>
                <input type="number" name="vida" id="vida" onwheel="this.blur()" <?= "value='{$vida}'"; ?>>
            </div>
            <div>
                <label for="equilibrio">Equilibrio arcano</label>
                <input type="number" name="equilibrio" id="equilibrio" onwheel="this.blur()" <?= "value='{$equilibrio}'"; ?>>
            </div>
        </form>

        <form class="magias" id="magias">
            <div>
                <label for="magia_1">Magia 1</label>
                <textarea name="magia[]" id="magia_1"><?= $magics[0]['description']; ?></textarea>
            </div>
            <div>
                <label for="magia_2">Magia 2</label>
                <textarea name="magia[]" id="magia_2"><?= $magics[1]['description']; ?></textarea>
            </div>
            <div>
                <label for="magia_3">Magia 3</label>
                <textarea name="magia[]" id="magia_3"><?= $magics[2]['description']; ?></textarea>
            </div>
            <div>
                <label for="magia_4">Magia 4</label>
                <textarea name="magia[]" id="magia_4"><?= $magics[3]['description']; ?></textarea>
            </div>
            <div>
                <label for="magia_5">Magia 5</label>
                <textarea name="magia[]" id="magia_5"><?= $magics[4]['description']; ?></textarea>
            </div>
        </form>

        <form class="itens-container" id="itens_container">
            <div class="itens-mini-container">
                <div class="itens-text">
                    <h2>Itens Gerais</h2>
                    <div>
                        <span>qtd</span>
                        <span>peso</span>
                        <span>total</span>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[0]['name']}'" ?>>
                    <div class=" itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[0]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[0]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[1]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[1]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[1]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[2]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[2]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[2]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[3]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[3]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[3]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[4]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[4]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[4]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[5]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[5]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[5]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[6]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[6]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[6]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[7]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[7]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[7]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[8]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[8]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[8]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
            </div>
            <div class="itens-mini-container">
                <div class="itens-text">
                    <h2>Itens Gerais</h2>
                    <div>
                        <span>qtd</span>
                        <span>peso</span>
                        <span>total</span>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[9]['name']}'" ?>>
                    <div class=" itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[9]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[9]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[10]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[10]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[10]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[11]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[11]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[11]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[12]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[12]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[12]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[13]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[13]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[13]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[14]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[14]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[14]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[15]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[15]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[15]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[16]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[16]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[16]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
                <div class="item">
                    <input type="text" name="item[]" <?= "value='{$itens[17]['name']}'" ?>>
                    <div class="itens-variants">
                        <input type="number" onwheel="this.blur()" name="quantidade[]" onkeyup="calcWeight(this)" <?= "value='{$itens[17]['qtd']}'" ?>>
                        <input type="number" onwheel="this.blur()" name="peso[]" onkeyup="calcWeight(this)" <?= "value='{$itens[17]['peso']}'" ?>>
                        <input type=" number" disabled>
                    </div>
                </div>
            </div>
        </form>

        <script src="../assets/js/ficha.js"></script>
    </section>
</body>

</html>