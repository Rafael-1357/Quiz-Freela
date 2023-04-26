const submitBtn = document.querySelector('.submit');

const calcularPontuacao = () => {
  let pontuacao = 0;
  const opcoesSelecionadas = document.querySelectorAll('.selecionado');
  
  // Soma das opções
  opcoesSelecionadas.forEach(opcao => pontuacao += parseInt(opcao.dataset.pontos));

  // Verificação de Raça
  const raca = document.getElementById('racas').value;
  const pontuacaoPorRaca = {Dobermann: 4, Boxer: 4, Cavalier: 6};
  pontuacao += pontuacaoPorRaca[raca] ?? 0;

  // Verificação de Idade
  const idade = document.getElementById('idade').value;
  pontuacao += idade > 8 ? 3 : 0;

  return pontuacao;
}

const salvarDadosForm = () => {
  const nome = document.getElementById('nome').value;
  const telefone = document.getElementById('numT').value.replaceAll(' ','').replaceAll('-', '');
  const raca = document.getElementById('racas').value;
  const pontuacao = calcularPontuacao();
  const bodyRequest = {nome, telefone, raca, pontuacao};

  fetch('/Quiz-Freela/formValidation.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(bodyRequest)
  });
};

submitBtn.addEventListener('click', () => {
  salvarDadosForm();
  //Chamar função de animação
});