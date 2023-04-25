const alternarVisualizacaoAlternativas = botao => {
  const menuAlternativas = botao.parentNode.parentNode.nextElementSibling;
  menuAlternativas.classList.toggle('alternativas--aberto');
};

const buttonAlternativas = document.querySelectorAll('.alternativasOpenClose');
buttonAlternativas.forEach(botao => botao.addEventListener('click', () => alternarVisualizacaoAlternativas(botao)));