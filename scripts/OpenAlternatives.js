// document.addEventListener('click', function(event) {
//   var target = event.target; // recupera o elemento que foi clicado
  
//   // verifica se o elemento clicado é um botão ou está dentro de um botão
//   if (target.matches('.alternativasOpenClose') || target.closest('.alternativasOpenClose') !== null) {
//     var botao = target.closest('.alternativasOpenClose'); // seleciona o botão correspondente
    
//     if (botao !== null) { // verifica se o botão foi selecionado corretamente
//       var id = botao.dataset.id; // recupera o valor do atributo data-id do botão clicado
//       var div = document.querySelector('.alternativas[data-id="' + id + '"]'); // seleciona a div correspondente
//       var icone = botao.querySelector('i'); // seleciona o ícone dentro do botão
      
//       if (div !== null && icone !== null) { // verifica se a div e o ícone foram selecionados corretamente
//         if (div.style.display === "block") { // verifica se a div já está visível
//           div.style.display = "none"; // oculta a div
//           icone.classList.add('close'); // adiciona a classe para girar o ícone
//         } else {
//           div.style.display = "block"; // torna a div visível
//           icone.classList.remove('close'); // adiciona a classe para girar o ícone
//         }
//       }
//     }
//   }
// });

// if(target.classList == 'alternativasOpenClose' || target.classList == 'fa-solid fa-angle-up close'){
//   const divAlternativas = target.parentNode.parentNode.parentNode.parentNode.childNodes[3];

//   if (divAlternativas.style.display == "") {
//     divAlternativas.style.display = "block";
//   } else {
//     divAlternativas.style.display = "";
//   }
// }

document.addEventListener('click', function(event) {
  var target = event.target;

  if(target instanceof HTMLButtonElement === true || target.parentNode.tagName.toLowerCase() === "button"){
    if(target instanceof HTMLButtonElement === true)    {
      console.log(target.parentNode)
    } else(
      console.log("foi")
    )
  }

  
})
