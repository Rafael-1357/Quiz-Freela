const data = {
  id: 1,
  nome: 'Sandro',
  telefone: '5522996074071',
  raca: 'Fox Paulistinha',
  pontuacao: '1'
}

fetch('/Quiz-Freela/formValidation.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
});