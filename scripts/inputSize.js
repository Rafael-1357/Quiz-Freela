document.addEventListener('DOMContentLoaded', function() {
  var nameInput = document.getElementById('alow');
  nameInput.addEventListener('keyup', function() {
    this.setAttribute('size', this.value.length);
  });
});
