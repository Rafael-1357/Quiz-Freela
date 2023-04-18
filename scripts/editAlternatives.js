document.addEventListener('click', function(event) {
  var target = event.target;

  if(target.parentNode.tagName.toLowerCase() === "button"){
    if(target.parentNode.parentNode.childNodes[3].tagName.toLowerCase() === 'input'){
      const inputWeight = target.parentNode.parentNode.childNodes[3]
      inputWeight.disabled = false;
      inputWeight.focus();
      inputWeight.addEventListener('blur', function(event) {
        inputWeight.disabled = true;
      });
    } else{
      const inputTitle = target.parentNode.parentNode.childNodes[1]
      inputTitle.disabled = false;
      inputTitle.focus();
      inputTitle.addEventListener('blur', function(event) {
        inputTitle.disabled = true;
      });
    }
  } else {
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
      input.disabled = true;
    });
  }
});
