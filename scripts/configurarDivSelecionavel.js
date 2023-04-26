const containerQuestoes = document.querySelectorAll('.questoesContainer');

const configurarSelecaoUnica = (containerQuestao) => {
  const opcoes = containerQuestao.querySelectorAll('.questao');
  opcoes.forEach(opcao => opcao.addEventListener('click', () => {
    const selecaoPassada = containerQuestao.querySelector('.selecionado');
    selecaoPassada?.classList.remove('selecionado');
    opcao.classList.add('selecionado');
  }));
};

const configurarSelecaoMultipla = (containerQuestao) => {
  const opcoes = containerQuestao.querySelectorAll('.questao');
  opcoes.forEach(opcao => opcao.addEventListener('click', () => opcao.classList.toggle('selecionado')));
};

containerQuestoes.forEach(containerQuestao => {
  const { tipo } = containerQuestao.dataset;
  
  if(tipo === "unica") {
    configurarSelecaoUnica(containerQuestao);
  } else {
    configurarSelecaoMultipla(containerQuestao);
  }
});