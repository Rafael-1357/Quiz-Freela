document.addEventListener('click', function(event) {
  var target = event.target;

  if(target.classList == 'alternativasOpenClose' || target.classList == 'fa-solid fa-angle-up close'){
    const divAlternativas = target.parentNode.parentNode.parentNode.parentNode.childNodes[3];
  
    if (divAlternativas.style.display == "") {
      divAlternativas.style.display = "block";
    } else {
      divAlternativas.style.display = "";
    }
  }
  
})