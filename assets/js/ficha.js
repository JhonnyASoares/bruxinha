const controllerUrl = './controller/Ficha.php'
document.addEventListener('DOMContentLoaded', function () {

    let atrVital = document.getElementById('vital')
    calcMainAtr(atrVital)
    let atrCognicao = document.getElementById('cognicao')
    calcMainAtr(atrCognicao)
    let atrCompreensao = document.getElementById('compreensao')
    calcMainAtr(atrCompreensao)
    let atrPerscicacia = document.getElementById('perscicacia')
    calcMainAtr(atrPerscicacia)
    let atrCharme = document.getElementById('charme')
    calcMainAtr(atrCharme)

    exeEvent()

    addInputEvent('itens_container')
    addInputEvent('cabecario')
    addInputEvent('atributos')
    addSelectEvent('perks')
    addInputEvent('life_container')
    addTextareaEvent('magias')
});
function calcMainAtr(input) {
    let secAtributes = input.parentNode.parentNode.lastElementChild
    for (let i = 0; i < secAtributes.children.length; i++) {
        let secAtribute = secAtributes.children[i].lastElementChild.firstElementChild
        secAtribute.value = input.value
        calcSecAtr(secAtribute)
    }
}

function calcSecAtr(input) {
    let atribute = input.parentNode.firstElementChild
    if (atribute.value == "") {
        atribute.value = 0
    }
    let secDiv = input.parentNode.lastElementChild
    let midChild = secDiv.firstElementChild
    if (midChild.value == "") {
        midChild.value = 0
    }
    let total = secDiv.lastElementChild

    total.value = parseInt(atribute.value) + parseInt(midChild.value)
}

function calcBonus(input) {
    let atribute = input.parentNode.parentNode.firstElementChild
    if (atribute.value == "") {
        atribute.value = 0
    }
    if (input.value == "") {
        input.value = 0
    }
    let total = input.parentNode.lastElementChild
    total.value = parseInt(atribute.value) + parseInt(input.value)
}

async function callPerks(select) {
    if (select.childElementCount <= 1) {
        let perkList = await getPerkList()
        let options = '<option value=""></option>'
        for (let perk of perkList) {
            options += `<option value="${perk.code_name}">${perk.name}</option>`
        }
        select.innerHTML = options
    }
    if (select.id == "prk_1") {
        perkDescription(select.value, 'prk_desc_1')
    }
    if (select.id == "prk_2") {
        perkDescription(select.value, 'prk_desc_2')
    }
}
async function getPerkList() {

    const response = await fetch(controllerUrl, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ get_perks: "" })
    });
    const data = await response.json(); // converte a resposta para JSON
    return data;
}

async function perkDescription(perkValue, textareaId) {
    let textarea = document.getElementById(textareaId)
    let perkList = await getPerkList()
    if (perkValue == "") {
        textarea.innerHTML = ''
    } else {
        for (let perk of perkList) {
            if (perkValue == perk.code_name) {
                textarea.innerHTML = perk.name + ': ' + perk.description
            }
        }
    }
}

function calcWeight(input) {
    let inputsDiv = input.parentNode
    let amount = inputsDiv.firstElementChild
    let weight = inputsDiv.children[1]
    let total = inputsDiv.lastElementChild
    if (amount.value != "" && weight.value != "") {
        total.value = parseFloat(amount.value) * parseFloat(weight.value)
    } else {
        total.value = 0
    }
}


function addInputEvent(formId) {
    // Seleciona o elemento pai
    let pai = document.getElementById(formId);
    // Seleciona todos os elementos filhos, netos, etc. do elemento pai
    let allInputs = pai.querySelectorAll('input');
    // Adiciona o evento a cada descendente
    allInputs.forEach(descendente => {
        descendente.setAttribute('onblur', `saveData(${formId})`);
    });
}
function addSelectEvent(formId) {
    // Seleciona o elemento pai
    let pai = document.getElementById(formId);
    // Seleciona todos os elementos filhos, netos, etc. do elemento pai
    let allSelects = pai.querySelectorAll('select');
    // Adiciona o evento a cada descendente
    allSelects.forEach(descendente => {
        descendente.setAttribute('onblur', `saveData(${formId})`);
    });
}
function addTextareaEvent(formId) {
    // Seleciona o elemento pai
    let pai = document.getElementById(formId);
    // Seleciona todos os elementos filhos, netos, etc. do elemento pai
    let allTextareas = pai.querySelectorAll('textarea');
    // Adiciona o evento a cada descendente
    allTextareas.forEach(descendente => {
        descendente.setAttribute('onblur', `saveData(${formId})`);
    });
}

function saveData(formId) {
    let formEdit = new FormData(document.getElementById(formId.id))
    let fichaId = document.getElementById('ficha_id')
    formEdit.append('ficha_id', fichaId.value)
    fetch(controllerUrl, {
        method: "POST",
        body: formEdit
    })
}

function exeEvent() {
    let inputs = document.getElementsByName("quantidade[]")
    for (let i = 0; i < inputs.length; i++) {
        calcWeight(inputs[i])
    }
}
