const editButtons = document.querySelectorAll('.edit-btn');
const questions   = document.querySelectorAll('input[type="text"]');

const habilitarCampo = (input) => {
  input.removeAttribute('disabled');
  input.focus();
};

const desabilitarCampo = (input) => input.setAttribute('disabled', '');

const salvarAlteracoes = (input) => {
  desabilitarCampo(input);
  const {operation, id} = input.dataset;
  const value = input.value;

  const requestBody = {operation, id, value};

  fetch('/Quiz-Freela/editQuestions.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(requestBody)
  });
};

editButtons.forEach(button => button.addEventListener('click', () => habilitarCampo(button.previousElementSibling)));
questions.forEach(input => input.addEventListener('blur', () => salvarAlteracoes(input)));
questions.forEach(input => input.addEventListener('keydown', (event) => {
  if(event.key === 'Enter') {
    input.blur();
  }
}));