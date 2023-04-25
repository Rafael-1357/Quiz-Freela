// Páginas
const page1 = document.getElementById('page1');
const page2 = document.getElementById('page2');
const page3 = document.getElementById('page3');
const page4 = document.getElementById('page4');
const page5 = document.getElementById('page5');
const page6 = document.getElementById('page6');
const page7 = document.getElementById('page7');
const page8 = document.getElementById('page8');
const page81 = document.getElementById('page81');
const page9 = document.getElementById('page9');
const page91 = document.getElementById('page91');
const containerLoading = document.getElementById('containerLoading')
const containerResult = document.getElementById('containerResult');
const containerQuiz = document.getElementById('containerQuiz')
const wpp = document.querySelector('#wpp a')
const h1Baixa = document.getElementById('h1Baixa')
const h1Pouca = document.getElementById('h1Pouca')
const h1Alta = document.getElementById('h1Alta')
const pBaixa = document.getElementById('pBaixa')
const pPouca = document.getElementById('pPouca')
const pAlta = document.getElementById('pAlta')
const h4Baixa = document.getElementById('h4Baixa')
const h4Pouca = document.getElementById('h4Pouca')
const h4Alta = document.getElementById('h4Alta')

// Botões avançar
const page1Button = document.getElementById('page1Button');
const page2ButtonNext = document.getElementById('page2Next');
const page3ButtonNext = document.getElementById('page3Next')
const page4ButtonNext = document.getElementById('page4Next')
const page5ButtonNext = document.getElementById('page5Next')
const page6ButtonNext = document.getElementById('page6Next')
const page7ButtonNext = document.getElementById('page7Next')
const page8ButtonNext = document.getElementById('page8Next')
const page81ButtonNext = document.getElementById('page81Next')
const page9ButtonNext = document.getElementById('page9Next')
const page91ButtonNext = document.getElementById('page91Next')

// Botoões voltar
const page3ButtonPrev = document.getElementById('page3Prev');
const page4ButtonPrev = document.getElementById('page4Prev');
const page5ButtonPrev = document.getElementById('page5Prev');
const page6ButtonPrev = document.getElementById('page6Prev');
const page7ButtonPrev = document.getElementById('page7Prev');
const page8ButtonPrev = document.getElementById('page8Prev');
const page81ButtonPrev = document.getElementById('page81Prev');
const page9ButtonPrev = document.getElementById('page9Prev');
const page91ButtonPrev = document.getElementById('page91Prev');

// inputs
const inputNome = document.getElementById('nome');
const inputNumT = document.getElementById('numT')
const inputNomep = document.getElementById('nomeP')
const inputRacas = document.getElementById('racas')
const inputIdade = document.getElementById('idade')


// Eventos dos botões avançar
page1Button.addEventListener('click', () => {
  page1.style.display = 'none';
  page2.style.display = 'flex';
})

page2ButtonNext.addEventListener('click', () => {
  page2.style.display = 'none'
  page3.style.display = 'flex'
})

page3ButtonNext.addEventListener('click', () => {
  page3.style.display = 'none'
  page4.style.display = 'flex'
  if(inputIdade.value >= 8){
    pIdade = 3;
  };

  if(inputRacas.value == 'Boxer' || inputRacas.value == 'Dobermann'){
    pRaca = 4
  } else if(inputRacas.value == 'Cavalier'){
    pRaca = 6
  } 
})

page4ButtonNext.addEventListener('click', () => {
  page4.style.display = 'none'
  page5.style.display = 'flex'
  questoes4.forEach((div, index) => {
    if (div.classList.contains('selecionado')) {
      if (index === 1) {
        pPeso = 4;
      } 
    }
  })
})

page5ButtonNext.addEventListener('click', () => {
  page5.style.display = 'none'
  page6.style.display = 'flex'

  questoes5.forEach((div, index) => {
    if (div.classList.contains('selecionado')) {
      if (index === 0) {
        pTosse = 3;
      } else if (index === 1) {
        pTosse = 3;
      } else if (index === 2) {
        pTosse = 3;
      }
    }
  })

  if(pTosse != 0){
    pTosse += 1;
  }
})

page6ButtonNext.addEventListener('click', () => {
  page6.style.display = 'none'
  page7.style.display = 'flex'

  questoes6.forEach((div, index) => {
    if (div.classList.contains('selecionado')) {
      if (index === 0) {
        pCansaco += 3;
      } else if (index === 1) {
        pCansaco += 3;
      } else if (index === 2) {
        pCansaco += 3;
      }
    }
  })

  if(pCansaco != 0){
    pCansaco += 1;
  }
})

page7ButtonNext.addEventListener('click', () => {
  page7.style.display = 'none'
  page8.style.display = 'flex'

  questoes7.forEach((div, index) => {
    if (div.classList.contains('selecionado')) {
      if (index === 0 || index === 1 || index === 2) {
        pInchaco = 3;
      } 
    }
  })
})

page8ButtonNext.addEventListener('click', () => {
  page8.style.display = 'none'
  const primeiraDiv = document.querySelector("#page8 .questao:first-child");
  if (primeiraDiv.classList.contains("selecionado")) {
    page81.style.display = 'flex'
  } else {
    page9.style.display = 'flex'
  }

  questoes8.forEach((div, index) => {
    if (div.classList.contains('selecionado')) {
      if (index === 0) {
        pPraia = 3;
      } 
    }
  })

})

page81ButtonNext.addEventListener('click', () => {
  page81.style.display = 'none'
  page9.style.display = 'flex'

  questoes8.forEach((div, index) => {
    if (div.classList.contains('selecionado')) {
      if (index === 0) {
        pPraia += 3;
      } 
    }
  })

})

page9ButtonNext.addEventListener('click', () => {
  
  const div1 = document.querySelector("#page9 .questao");
  const div2 = document.querySelector("#page9 .questao:nth-child(1)");
  const div3 = document.querySelector("#page9 .questao:nth-child(2)");

  questoes9.forEach((div, index) => {
    if (div.classList.contains('selecionado')) {
      if (index === 0) {
        pExames += 1;
      } else if (index === 1) {
        pExames += 1;
      } else if (index === 2) {
        pExames += 1;
      }
    }
  })
  
  if (div1.classList.contains("selecionado") || div2.classList.contains("selecionado") || div3.classList.contains("selecionado")) {
    page9.style.display = 'none'
    page91.style.display = 'flex'
  } else {
    containerQuiz.style.display = 'none'
    containerLoading.style.display = 'flex'
  
    setTimeout(() => {

      containerLoading.style.display = 'none'

      totalPontuacao = pIdade + pPeso + pTosse + pCansaco + pInchaco + pPeso + pExames;
    
      if(totalPontuacao <= 3){
        document.getElementById('imagemBaixa').classList.add('visivel')
        h1Baixa.style.display = 'flex'
        pBaixa.style.display = 'flex'
        h4Baixa.style.display = 'flex'
      } else if(totalPontuacao > 3 && totalPontuacao <= 6){
        document.getElementById('imagemPouca').classList.add('visivel')
        document.getElementById('wpp').style.display = "inline-block"
        h1Pouca.style.display = 'flex'
        pPouca.style.display = 'flex'
        h4Pouca.style.display = 'flex'
      } else if(totalPontuacao > 6){
        document.getElementById('imagemAlta').classList.add('visivel')
        document.getElementById('wpp').style.display = "inline-block"
        h1Alta.style.display = 'flex'
        pAlta.style.display = 'flex'
        h4Alta.style.display = 'flex'
      }

      wpp.href = `https://wa.me/+5522997232660?text=Olá, me chamo ${inputNome.value} e gostaria de marcar uma consulta para o(a) ${inputNomep.value}, quando há vagas?`

    containerResult.style.display = 'flex'
    }, "3000");
  }

  
  questoes8.forEach((div, index) => {
    if (div.classList.contains('selecionado')) {
      if (index === 0) {
        pExames += 1;
      } else if (index === 1) {
        pExames += 1;
      } else if (index === 2) {
        pExames += 1;
      }
    }
  })

})

page91ButtonNext.addEventListener('click', () => {
  page91.style.display = 'none'
  containerQuiz.style.display = 'none'

  containerLoading.style.display = 'flex'

  questoes91.forEach((div, index) => {
    if (div.classList.contains('selecionado')) {
      if (index === 1) {
        pExames += 6;
      } 
    }
  })
  
  setTimeout(() => {

    containerLoading.style.display = 'none'

    totalPontuacao = pIdade + pPeso + pTosse + pCansaco + pInchaco + pPeso + pExames;
  
    if(totalPontuacao <= 3){
      document.getElementById('imagemBaixa').classList.add('visivel')
      h1Baixa.style.display = 'flex'
      pBaixa.style.display = 'flex'
      h4Baixa.style.display = 'flex'
    } else if(totalPontuacao > 3 && totalPontuacao <= 6){
      document.getElementById('imagemPouca').classList.add('visivel')
      document.getElementById('wpp').style.display = "inline-block"
      h1Pouca.style.display = 'flex'
      pPouca.style.display = 'flex'
      h4Pouca.style.display = 'flex'
    } else if(totalPontuacao > 6){
      document.getElementById('imagemAlta').classList.add('visivel')
      document.getElementById('wpp').style.display = "inline-block"
      h1Alta.style.display = 'flex'
      pAlta.style.display = 'flex'
      h4Alta.style.display = 'flex'
    }

    wpp.href = `https://wa.me/+5522997232660?text=Olá, me chamo ${inputNome.value} e gostaria de marcar uma consulta para o(a) ${inputNomep.value}, quando há vagas?`

  containerResult.style.display = 'flex'
  }, "3000");
})

//Eventos dos botões voltar

page3ButtonPrev.addEventListener('click', () => {
  page3.style.display = 'none'
  page2.style.display = 'flex'
})

page4ButtonPrev.addEventListener('click', () => {
  page4.style.display = 'none'
  page3.style.display = 'flex'
  pIdade = 0;
  pRaca = 0;
})

page5ButtonPrev.addEventListener('click', () => {
  page5.style.display = 'none'
  page4.style.display = 'flex'
  pPeso = 0
})

page6ButtonPrev.addEventListener('click', () => {
  page6.style.display = 'none'
  page5.style.display = 'flex'
  pTosse = 0
})

page7ButtonPrev.addEventListener('click', () => {
  page7.style.display = 'none'
  page6.style.display = 'flex'
  pCansaco = 0
})

page8ButtonPrev.addEventListener('click', () => {
  page8.style.display = 'none'
  page7.style.display = 'flex'
  pInchaco = 0
})

page81ButtonPrev.addEventListener('click', () => {
  page81.style.display = 'none'
  page8.style.display = 'flex'
  pPraia = 0
})

page9ButtonPrev.addEventListener('click', () => {
  page9.style.display = 'none'
  page8.style.display = 'flex'
  pPraia = 0
})

page91ButtonPrev.addEventListener('click', () => {
  page91.style.display = 'none'
  page9.style.display = 'flex'
  pExames = 0
})


// Eventos dos inputs

page2.addEventListener('click', () => {
  if(inputNome.value != '' && inputNumT.value != ''){
    page2ButtonNext.disabled = false;
  }
})

page3.addEventListener('click', () => {
  if(inputNomep.value != '' && inputRacas.value != 'selecione' && inputIdade.value != ''){
    page3ButtonNext.disabled = false;
  }
})

// Eventos nas alternativas

const questoes4 = document.querySelectorAll('#page4 .questao');
questoes4.forEach((questao4) => {
  questao4.addEventListener('click', () => {
    questoes4.forEach((q) => q.classList.remove('selecionado'));
    questao4.classList.add('selecionado');
    page4ButtonNext.disabled = false;
  });
});

const questoes5 = document.querySelectorAll('#page5 .questao');
questoes5.forEach((questao5) => {
  questao5.addEventListener('click', () => {
    questoes5.forEach((q) => q.classList.remove('selecionado'));
    questao5.classList.add('selecionado');
    page5ButtonNext.disabled = false;
  });
});

const questoes6 = document.querySelectorAll('#page6 .questao');
questoes6.forEach((questao6) => {
  questao6.addEventListener('click', () => {
    questao6.classList.toggle('selecionado');
    page6ButtonNext.disabled = false;
  });
});

const questoes7 = document.querySelectorAll('#page7 .questao');
questoes7.forEach((questao7) => {
  questao7.addEventListener('click', () => {
    questao7.classList.toggle('selecionado');
    page7ButtonNext.disabled = false;
  });
});

const questoes8 = document.querySelectorAll('#page8 .questao');
questoes8.forEach((questao8) => {
  questao8.addEventListener('click', () => {
    questoes8.forEach((q) => q.classList.remove('selecionado'));
    questao8.classList.add('selecionado');
    page8ButtonNext.disabled = false;
  });
});

const questoes81 = document.querySelectorAll('#page81 .questao');
questoes81.forEach((questao81) => {
  questao81.addEventListener('click', () => {
    questao81.classList.toggle('selecionado');
    page81ButtonNext.disabled = false;
  });
});

const questoes9 = document.querySelectorAll('#page9 .questao');
questoes9.forEach((questao9) => {
  questao9.addEventListener('click', () => {
    questao9.classList.toggle('selecionado');
    page9ButtonNext.disabled = false;
  });
});

const questoes91 = document.querySelectorAll('#page91 .questao');
questoes91.forEach((questao91) => {
  questao91.addEventListener('click', () => {
    questao91.classList.toggle('selecionado');
    page91ButtonNext.disabled = false;
  });
});

// Pontuação

let pRaca = 0;
let pIdade = 0;
let pPeso = 0;
let pTosse = 0;
let pCansaco = 0;
let pInchaco = 0;
let pPraia = 0;
let pExames = 0;
let totalPontuacao = 0;



