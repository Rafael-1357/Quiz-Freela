<?php
  include 'BDConection.php';
  $mysqli = conectarBD();

  $select_perguntas = $mysqli->query('SELECT descricao FROM Perguntas');
  $select_opcoes    = $mysqli->query('SELECT descricao, idPergunta FROM Opcoes');

  $perguntas = array();
  $opcoes = array();

  while($pergunta = $select_perguntas->fetch_array(MYSQLI_ASSOC)) {
    $perguntas[] = $pergunta;
  }

  while($opcao = $select_opcoes->fetch_array(MYSQLI_ASSOC)) {
    $opcoes[$opcao['idPergunta'] - 1][] = $opcao;
  }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz</title>
  
  <!-- CSS quiz -->
  <link rel="stylesheet" href="styles/quiz.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
</head>

<body>
  <main id="content">
    <div id="containerQuiz" class="swiper">
      <div id="quiz" class="swiper-wrapper">
        <div id="page1" class="quiz-pages swiper-slide">
          <div id="logo">LOGO</div>
          <h1>Saiba se seu cachorro pode ter alguma enfermidade cardíaca.</h1>
          <p>Seu animal precisa de muito amor e cuidado, responda um rápido questionário para saber se ele pode ter algum problema cardíaco.</p>
          <button id="page1Button" class='next-btn'>Iniciar questionário</button>
        </div>
        <div id="page2" class="quiz-pages swiper-slide">
          <div class="perguntas">
            <label for="nome">Nome <strong>*</strong></label>
            <input type="text" maxlength="25" placeholder="Seu Nome" name="nome" id="nome">
            <label for="numT">Número de telefone <strong>*</strong></label>
            <input type="text" pattern="([0-9]{2})" maxlength="13" OnKeyPress="formatar('## ####-#####', this)" placeholder="(99) 9999-99999" name="numT" id="numT">
            <div class="botoesPerguntas">
              <button id="page2Next" class='next-btn'>Avançar</button>
            </div>
          </div>
        </div>
        <div id="page3" class="quiz-pages swiper-slide">
          <div class="perguntas">
            <label for="nomoP">Qual o nome do seu pet<strong>*</strong></label>
            <input type="text" maxlength="25" name="nomeP" id="nomeP">
            <label for="racas">Qual a raça?<strong>*</strong></label>
            <select class="js-example-basic-single" name="racas" id="racas">
              <option value="selecione">selecione</option>
            </select>
            <label for="idade">Qual a idade?<strong>*</strong></label>
            <input type="text" maxlength="2" pattern="([0-9]{2})" OnKeyPress="formatar('##', this)" name="idade" id="idade">
            <div class="botoesPerguntas">
              <button id="page3Prev">Voltar</button>
              <button id="page3Next" class='next-btn'>Avançar</button>
            </div>
          </div>
        </div>
        <div id="page4" class="quiz-pages swiper-slide questoesContainer" data-tipo="unica">
          <div class="perguntasBD">
            <div class="titulo">
              <h1>1</h1>
              <p><?php echo $perguntas[0]['descricao']?></p>
            </div>
            <div class="questoes">
              <div class="questao" data-pontos="4"><?php echo $opcoes[0][0]['descricao']?></div>
              <div class="questao" data-pontos="0"><?php echo $opcoes[0][1]['descricao']?></div>
            </div>
          </div>
          <div class="botoesPerguntas botoesPerguntasBD">
            <button id="page4Prev">Voltar</button>
            <button id="page4Next" class='next-btn' >Avançar</button>
          </div>
        </div>
        <div id="page5" class="quiz-pages swiper-slide questoesContainer" data-tipo="unica">
          <div class="perguntasBD">
            <div class="titulo">
              <h1>2</h1>
              <p><?php echo $perguntas[1]['descricao']?></p>
            </div>
            <div class="questoes">
              <div class="questao" data-pontos="0"><?php echo $opcoes[1][0]['descricao']?></div>
              <div class="questao" data-pontos="0"><?php echo $opcoes[1][1]['descricao']?></div>
              <div class="questao" data-pontos="3"><?php echo $opcoes[1][2]['descricao']?></div>
              <div class="questao" data-pontos="0"><?php echo $opcoes[1][3]['descricao']?></div>
            </div>
          </div>
          <div class="botoesPerguntas botoesPerguntasBD">
            <button id="page5Prev">Voltar</button>
            <button id="page5Next" class='next-btn' >Avançar</button>
          </div>
        </div>
        <div id="page6" class="quiz-pages swiper-slide questoesContainer" data-tipo="multipla">
          <div class="perguntasBD">
            <div class="titulo multiplo">
              <h1>3</h1>
              <p><?php echo $perguntas[2]['descricao']?></p>
            </div>
            <span>Nessa questão, pode selecionar mais de uma alternativa</span>

            <div class="questoes">
              <div class="questao" data-pontos="3"><?php echo $opcoes[2][0]['descricao']?></div>
              <div class="questao" data-pontos="3"><?php echo $opcoes[2][1]['descricao']?></div>
              <div class="questao" data-pontos="3"><?php echo $opcoes[2][2]['descricao']?></div>
              <div class="questao" data-pontos=""><?php echo $opcoes[2][3]['descricao']?></div>
            </div>
          </div>
          <div class="botoesPerguntas botoesPerguntasBD">
            <button id="page6Prev">Voltar</button>
            <button id="page6Next" class='next-btn' >Avançar</button>
          </div>
        </div>
        <div id="page7" class="quiz-pages swiper-slide questoesContainer" data-tipo="multipla">
          <div class="perguntasBD">
            <div class="titulo multiplo">
              <h1>4</h1>
              <p><?php echo $perguntas[3]['descricao']?></p>
            </div>
            <span>Nessa questão, pode selecionar mais de uma alternativa</span>
            <div class="questoes">
              <div class="questao" data-pontos="3"><?php echo $opcoes[3][0]['descricao']?></div>
              <div class="questao" data-pontos="3"><?php echo $opcoes[3][1]['descricao']?></div>
              <div class="questao" data-pontos="3"><?php echo $opcoes[3][2]['descricao']?></div>
              <div class="questao" data-pontos="0"><?php echo $opcoes[3][3]['descricao']?></div>
            </div>
          </div>
          <div class="botoesPerguntas botoesPerguntasBD">
            <button id="page7Prev">Voltar</button>
            <button id="page7Next" class='next-btn' >Avançar</button>
          </div>
        </div>
        <div id="page8" class="quiz-pages swiper-slide questoesContainer" data-tipo="unica">
          <div class="perguntasBD">
            <div class="titulo">
              <h1>5</h1>
              <p><?php echo $perguntas[4]['descricao']?></p>
            </div>
            <div class="questoes">
              <div class="questao" data-pontos="3"><?php echo $opcoes[4][0]['descricao']?></div>
              <div class="questao" data-pontos="0"><?php echo $opcoes[4][1]['descricao']?></div>
            </div>
          </div>
          <div class="botoesPerguntas botoesPerguntasBD">
            <button id="page8Prev">Voltar</button>
            <button id="page8Next" class='next-btn' >Avançar</button>
          </div>
        </div>
        <div id="page9" class="quiz-pages swiper-slide questoesContainer" data-tipo="unica">
          <div class="perguntasBD">
            <div class="titulo">
              <h1>6</h1>
              <p><?php echo $perguntas[5]['descricao']?></p>
            </div>
            <div class="questoes">
              <div class="questao" data-pontos="0"><?php echo $opcoes[5][0]['descricao']?></div>
              <div class="questao" data-pontos="3"><?php echo $opcoes[5][1]['descricao']?></div>
            </div>
          </div>
          <div class="botoesPerguntas botoesPerguntasBD">
            <button id="page81Prev">Voltar</button>
            <button id="page81Next" class='next-btn' >Avançar</button>
          </div>
        </div>
        <div id="page10" class="quiz-pages swiper-slide questoesContainer" data-tipo="multipla">
          <div class="perguntasBD">
            <div class="titulo multiplo">
              <h1>7</h1>
              <p><?php echo $perguntas[6]['descricao']?></p>
            </div>
            <span>Nessa questão, pode selecionar mais de uma alternativa</span>
            <div class="questoes">
              <div class="questao" data-pontos="1"><?php echo $opcoes[6][0]['descricao']?></div>
              <div class="questao" data-pontos="1"><?php echo $opcoes[6][1]['descricao']?></div>
              <div class="questao" data-pontos="1"><?php echo $opcoes[6][2]['descricao']?></div>
              <div class="questao" data-pontos="0"><?php echo $opcoes[6][3]['descricao']?></div>
            </div>
          </div>
          <div class="botoesPerguntas botoesPerguntasBD">
            <button id="page9Prev">Voltar</button>
            <button id="page9Next" class='next-btn' >Avançar</button>
          </div>
        </div>
        <div id="page11" class="quiz-pages swiper-slide questoesContainer" data-tipo="unica">
          <div class="perguntasBD">
            <div class="titulo multiplo">
              <h1>8</h1>
              <p><?php echo $perguntas[7]['descricao']?></p>
            </div>
            <div class="questoes">
              <div class="questao" data-pontos="6"><?php echo $opcoes[7][0]['descricao']?></div>
              <div class="questao" data-pontos="0"><?php echo $opcoes[7][1]['descricao']?></div>
            </div>
          </div>
          <div class="botoesPerguntas botoesPerguntasBD">
            <button id="page91Prev">Voltar</button>
            <button id="page91Next" class='submit' >Avançar</button>
          </div>
        </div>
      </div>
      <div id="quiz-imagens">
        <img src="./assets/Frame 8.png" alt="">
      </div>
    </div>
    <div id="containerLoading" >
      <h1>Aguarde um momento <br> para o resultado</h1>
      <div id="contentLoading">
        <div id="loading"></div>
      </div>
      <p>Aguardem só um pouquinho...</p>
    </div>
    <div id="containerResult" >
      <div id="pingo">
        <img src="./assets/dogIcon.svg" alt="">
        <h3>pingo</h3>
      </div>
      <p>Resultado do Questionário</p>
      <div id="probabilidade">
        <img id="imagemBaixa" src="./assets/dogbaixa.svg" alt="">
        <div id="baixa"></div>
        <div id="baixapouca"></div>
        <img id="imagemPouca" src="./assets/dogpouca.svg" alt="">
        <div id="pouca"></div>
        <div id="poucaalta"></div>
        <img id="imagemAlta" src="./assets/dogalta.svg" alt="">
        <div id="alta"></div>
      </div>
      <h1 id="h1Baixa">Provavelmente que seu pet não tenha <br> doença cardíaca</h1>
      <h1 id="h1Pouca">É possível que seu pet tenha alguma <br> doença cardíaca ou poderá ter no futuro</h1>
      <h1 id="h1Alta">É possível que seu pet tenha alguma <br> doença cardíaca</h1>
      <p id="pBaixa">As informações sugerem que o seu pet tem baixa <br> probabilidade de ter alguma enfermidade cardíaca.</p>
      <p id="pPouca">As informações sugerem que o seu pet tem pouca <br> probabilidade de ter alguma enfermidade cardíaca.</p>
      <p id="pAlta">As informações sugrem que o seu pet tem alta <br> probabilidade de ter alguma enfermidade cardíaca, por isso é <br> importante passar em um consulta com um cardiologista veterinário.</p>
      <h4 id="h4Baixa">Refaça esse teste pelo menos uma vez a cada ano.</h4>
      <h4 id="h4Pouca">Ainda assim é importante solicitar ao veterinário que <br> avalie a necessidade de encaminha-lo para um especialista.</h4>
      <h4 id="h4Alta">As informações sugrem que o seu pet tem alta probabilidade <br> de ter alguma enfermidade cardíaca, por isso é importante passar <br> em um consulta com um cardiologista veterinário.</h4>
      <div id="resultButtoms">
        <button>Refazer Questionario</button>
        <button id="wpp"><a target="_blank" href="">Agendar uma consulta</a></button>
      </div>
      <span>clique para refazer o questionário</span>
    </div>

  </main>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="./scripts/paginacaoQuiz.js"></script>
  <script src="./scripts/configurarDivSelecionavel.js"></script>
  <script src="./scripts/salvarDadosForm.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
  <script>
    // In your Javascript (external .js resource or <script> tag)
      $(document).ready(function() {
        $('.js-example-basic-single').select2({
          width : '80%',
          border : '1px solid red'
        });
        
      });

      $(document).ready(function() {
        $("#idade").keyup(function() {
            $("#idade").val(this.value.match(/[0-9]*/));
        });
      });

      $(document).ready(function() {
        $("#numT").keyup(function() {
            $("#numT").val(this.value.match(/^[\d\s-]+$/));
        });
      });

      function formatar(mascara, documento){
        let i = documento.value.length;
        let saida = mascara.substring(0,1);
        let texto = mascara.substring(i)
        
        if (texto.substring(0,1) != saida){
                  documento.value += texto.substring(0,1);
        }
        
      }
  </script>
  <script src="./scripts/racas.js"></script>
</body>

</html>