
function avaliacao() {
    // Obter o valor selecionado
    var unidadeId = document.getElementById("unidade_id").value;

    // Redirecionar para a rota dinâmica
    window.location.href = "{{ path('app_avaliacao', {'unidade_id': '__unidadeId__'}) }}".replace('__unidadeId__', unidadeId);
}

//menu toggle
let toggle = document.querySelector('.toggle');
let navegation = document.querySelector('.navegation');
let main = document.querySelector('.main');

toggle.onclick = function(){
    navegation.classList.toggle('active')
    main.classList.toggle('active')
}

let list = document.querySelectorAll('.navegation li');
function activeLink(){
    list.forEach((item) =>
    item.classList.remove('hovered'));
    this.classList.add('hovered');
}
list.forEach((item) => 
item.addEventListener('mouseover', activeLink));
