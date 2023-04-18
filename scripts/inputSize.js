document.addEventListener('DOMContentLoaded', function() {
  var inputs = document.querySelectorAll('input');
  
  function resizeInputs() {
    inputs.forEach(function(input) {
      var width = (input.value.length * 8) + 8;
      if (width < 30) { // limita a largura mínima em 30 pixels
        width = 30;
      } else if (width > 500) { // limita a largura máxima em 500 pixels
        width = 500;
      }
      input.style.width = width + 'px';
    });
  }
  
  resizeInputs(); // chama a função de redimensionamento ao carregar a página
  
  inputs.forEach(function(input) {
    input.addEventListener('input', function() {
      var width = (input.value.length * 8) + 8;
      if (width < 30) { // limita a largura mínima em 30 pixels
        width = 30;
      } else if (width > 500) { // limita a largura máxima em 500 pixels
        width = 500;
      }
      this.style.width = width + 'px';
    });
  });
});
