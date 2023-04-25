<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS reset -->
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/perguntas.css">

</head>
<body>

  <header>
    <div id="headerContainer">
      <div id="logo">LOGO</div>
      <div id="headerLinks">
        <a href="#" class="selected">Perguntas</a>
        <a href="#">Respostas</a>
      </div>
    </div>
  </header>

  <main>
    <div id="mainContainer">
      <h1 id="mainContainerTitulo">Perguntas</h1>
      <p id="mainContainerFrase">Aqui você consegue editar algumas informações como, as perguntas, altenativas e o peso</p>
      <div id="perguntasContainer">
        <?php
          include 'BDConection.php';
          $mysqli = conectarBD();
          $select_perguntas = $mysqli->query('SELECT * FROM Perguntas');

          function gerarContainerPerguntas($id, $descricao, $peso) {
            $html =    "<div class='perguntas'>";
            $html .=     "<div class='perguntasEsquerda'>";
            $html .=       "<h1 class='tituloPerguntas'>$id</h1>";
            $html .=       "<div class='titulo'>";
            $html .=         "<input type='text' data-id='$id' data-operation='question' value='$descricao' disabled>";
            $html .=         "<button class='edit-btn'><i class='fa-solid fa-pencil'></i></button>";
            $html .=       "</div>";
            $html .=     "</div>";
            $html .=     "<div class='perguntasDireita'>";
            $html .=       "<div class='peso'>";
            $html .=         "<p>Peso</p>";
            $html .=         "<input type='text' data-id='$id' data-operation='weigth' value='$peso' disabled>";
            $html .=         "<button class='edit-btn'><i class='fa-solid fa-pencil'></i></button>";
            $html .=       "</div>";
            $html .=       "<button class='alternativasOpenClose'><i class='fa-solid fa-angle-up close'></i></button>";
            $html .=     "</div>";
            $html .=   "</div>";
            
            return $html;
          }

          function gerarAlternativa($id, $descricao, $indice) {
            $html =  "<div class='alternativasContent'>";
            $html .=   "<h2 class='tituloAlternativas'>$indice</h2>";
            $html .=   "<div class='tituloInput'>";
            $html .=     "<input type='text' data-id='$id' data-operation='alternate' value='$descricao' disabled>";
            $html .=     "<button class='edit-btn'><i class='fa-solid fa-pencil'></i></button>";
            $html .=   "</div>";
            $html .= "</div>";

            return $html;
          }

          function gerarContainerAlternativas($select_opcoes) {
            $html = '';
            $i = 0;

            while($opcao = $select_opcoes->fetch_array(MYSQLI_ASSOC)) {
              $html .= gerarAlternativa($opcao['idOpcao'], $opcao['descricao'], ++$i);
            }

            return $html;
          }

          while($pergunta = $select_perguntas->fetch_array(MYSQLI_ASSOC)) {
            $select_opcoes = $mysqli->query('SELECT * FROM Opcoes WHERE idPergunta = '.$pergunta['idPergunta']);

            $html =  "<div class='perguntasContent'>";
            $html .=    gerarContainerPerguntas($pergunta['idPergunta'], $pergunta['descricao'], $pergunta['peso']); 
            $html .=   "<div class='alternativas'>";
            $html .=      gerarContainerAlternativas($select_opcoes);
            $html .=   "</div>";
            $html .= "</div>";

            echo $html;
          }
        ?>
        
        <!-- <div class="perguntasContent">
          <div class="perguntas">
            <div class="perguntasEsquerda">
              <h1 class="tituloPerguntas">1</h1>
              <div class="titulo">
                <input type="text" data-id="1" data-operation="question" id="alow" value="Qual o peso do seu animal?" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>

            <div class="perguntasDireita">
              <div class="peso">
                <p>peso</p>
                <input type="text" data-id="1" data-operation="weigth" value="1" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
              <button class="alternativasOpenClose" data-id="1">
                <i class="fa-solid fa-angle-up close"></i>
              </button>
            </div>
          </div>

          <div class="alternativas">
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">1</h3>
              <div class="tituloInput">
                <input type="text" data-id="1" data-operation="alternate" id="alow" value="Menos de 15 quilos" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>

            <div class="alternativasContent">
              <h3 class="tituloAlternativas">2</h2>
              <div class="tituloInput">
                <input type="text" data-id="2" data-operation="alternate" id="alow" value="Mais de 15 quilos" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="perguntasContent">
          <div class="perguntas">
            <div class="perguntasEsquerda">
              <h1 class="tituloPerguntas">2</h1>
              <div class="titulo">
                <input type="text" id="alow"  data-id="2" data-operation="question" value="Ele apresenta tosse? Se sim, a quanto tempo?" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="perguntasDireita">
              <div class="peso">
                <p>peso</p>
                <input type="text" data-id="2" data-operation="weigth" value="2" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
              <button class="alternativasOpenClose">
                <i class="fa-solid fa-angle-up close"></i>
              </button>
            </div>
          </div>
          <div class="alternativas">
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">1</h2>
              <div class="tituloInput">
                <input type="text" data-id="3" data-operation="alternate" id="alow" value="Há 3 dias" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">2</h2>
              <div class="tituloInput">
                <input type="text" data-id="4" data-operation="alternate" id="alow" value="Há 1 semana ou mais" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">3</h2>
              <div class="tituloInput">
                <input type="text" data-id="5" data-operation="alternate" value="Há 1 mês ou mais" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">3</h2>
              <div class="tituloInput">
                <input type="text" data-id="6" data-operation="alternate" value="Não apresenta tosse" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="perguntasContent">
          <div class="perguntas">
            <div class="perguntasEsquerda">
              <h1 class="tituloPerguntas">3</h1>
              <div class="titulo">
                <input type="text" data-id="3" data-operation="question" value="Apresenta cansaço ou falta de ar? Se sim em qual situação" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="perguntasDireita">
              <div class="peso">
                <p>peso</p>
                <input type="text" data-id="3" data-operation="weigth" value="2" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
              <button class="alternativasOpenClose">
                <i class="fa-solid fa-angle-up close"></i>
              </button>
            </div>
          </div>
          <div class="alternativas">
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">1</h2>
              <div class="tituloInput">
                <input type="text" data-id="7" data-operation="alternate" value="Parado" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">2</h2>
              <div class="tituloInput">
                <input type="text" data-id="8" data-operation="alternate" value="Caminhando" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">3</h2>
              <div class="tituloInput">
                <input type="text" data-id="9" data-operation="alternate" value="Dormindo" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">3</h2>
              <div class="tituloInput">
                <input type="text" data-id="10" data-operation="alternate" value="Não apresenta cansaço ou falta de ar" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="perguntasContent">
          <div class="perguntas">
            <div class="perguntasEsquerda">
              <h1 class="tituloPerguntas">4</h1>
              <div class="titulo">
                <input type="text" data-id="4" data-operation="question" value="Apresenta cansaço ou falta de ar? Se sim em qual situação" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="perguntasDireita">
              <div class="peso">
                <p>peso</p>
                <input type="text" data-id="4" data-operation="weigth" value="2" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
              <button class="alternativasOpenClose">
                <i class="fa-solid fa-angle-up close"></i>
              </button>
            </div>
          </div>
          <div class="alternativas">
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">1</h2>
              <div class="tituloInput">
                <input type="text" data-id="11" data-operation="alternate" value="Parado" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">2</h2>
              <div class="tituloInput">
                <input type="text" data-id="12" data-operation="alternate" value="Caminhando" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">3</h2>
              <div class="tituloInput">
                <input type="text" data-id="13" data-operation="alternate" value="Dormindo" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">4</h2>
              <div class="tituloInput">
                <input type="text" data-id="14" data-operation="alternate" value="Não apresenta cansaço ou falta de ar" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="perguntasContent">
          <div class="perguntas">
            <div class="perguntasEsquerda">
              <h1 class="tituloPerguntas">5</h1>
              <div class="titulo">
                <input type="text" data-id="5" data-operation="question" value="Apresenta cansaço ou falta de ar? Se sim em qual situação" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="perguntasDireita">
              <div class="peso">
                <p>peso</p>
                <input type="text" data-id="5" data-operation="weigth" value="2" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
              <button class="alternativasOpenClose">
                <i class="fa-solid fa-angle-up close"></i>
              </button>
            </div>
          </div>
          <div class="alternativas">
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">1</h2>
              <div class="tituloInput">
                <input type="text" data-id="15" data-operation="alternate" value="Parado" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">2</h2>
              <div class="tituloInput">
                <input type="text" data-id="16" data-operation="alternate" value="Caminhando" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">3</h2>
              <div class="tituloInput">
                <input type="text" data-id="17" data-operation="alternate" value="Dormindo" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">4</h2>
              <div class="tituloInput">
                <input type="text" data-id="18" data-operation="alternate" value="Não apresenta cansaço ou falta de ar" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="perguntasContent">
          <div class="perguntas">
            <div class="perguntasEsquerda">
              <h1 class="tituloPerguntas">5.1</h1>
              <div class="titulo">
                <input type="text" data-id="5.1" data-operation="question" value="Apresenta cansaço ou falta de ar? Se sim em qual situação" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="perguntasDireita">
              <div class="peso">
                <p>peso</p>
                <input type="text" data-id="5.1" data-operation="weigth" value="2" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
              <button class="alternativasOpenClose">
                <i class="fa-solid fa-angle-up close"></i>
              </button>
            </div>
          </div>
          <div class="alternativas">
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">1</h2>
              <div class="tituloInput">
                <input type="text" data-id="19" data-operation="alternate" value="Parado" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">2</h2>
              <div class="tituloInput">
                <input type="text" data-id="20" data-operation="alternate" value="Caminhando" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">3</h2>
              <div class="tituloInput">
                <input type="text" data-id="21" data-operation="alternate" value="Dormindo" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">4</h2>
              <div class="tituloInput">
                <input type="text" data-id="22" data-operation="alternate" value="Não apresenta cansaço ou falta de ar" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="perguntasContent">
          <div class="perguntas">
            <div class="perguntasEsquerda">
              <h1 class="tituloPerguntas">6</h1>
              <div class="titulo">
                <input type="text" data-id="6" data-operation="question" value="Apresenta cansaço ou falta de ar? Se sim em qual situação" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="perguntasDireita">
              <div class="peso">
                <p>peso</p>
                <input type="text" data-id="6" data-operation="weigth" value="2" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
              <button class="alternativasOpenClose">
                <i class="fa-solid fa-angle-up close"></i>
              </button>
            </div>
          </div>
          <div class="alternativas">
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">1</h2>
              <div class="tituloInput">
                <input type="text" data-id="23" data-operation="alternate" value="Parado" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">2</h2>
              <div class="tituloInput">
                <input type="text" data-id="24" data-operation="alternate" value="Caminhando" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">3</h2>
              <div class="tituloInput">
                <input type="text" data-id="25" data-operation="alternate" value="Dormindo" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">4</h2>
              <div class="tituloInput">
                <input type="text" data-id="26" data-operation="alternate" value="Não apresenta cansaço ou falta de ar" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="perguntasContent">
          <div class="perguntas">
            <div class="perguntasEsquerda">
              <h1 class="tituloPerguntas">6.1</h1>
              <div class="titulo">
                <input type="text" data-id="6.1" data-operation="question" value="Apresenta cansaço ou falta de ar? Se sim em qual situação" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="perguntasDireita">
              <div class="peso">
                <p>peso</p>
                <input type="text" data-id="6.1" data-operation="weigth" value="2" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
              <button class="alternativasOpenClose">
                <i class="fa-solid fa-angle-up close"></i>
              </button>
            </div>
          </div>
          <div class="alternativas">
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">1</h2>
              <div class="tituloInput">
                <input type="text" data-id="27" data-operation="alternate" value="Parado" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">2</h2>
              <div class="tituloInput">
                <input type="text" data-id="28" data-operation="alternate" value="Caminhando" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">3</h2>
              <div class="tituloInput">
                <input type="text" data-id="29" data-operation="alternate" value="Dormindo" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
            <div class="alternativasContent">
              <h3 class="tituloAlternativas">4</h2>
              <div class="tituloInput">
                <input type="text" data-id="30" data-operation="alternate" value="Não apresenta cansaço ou falta de ar" disabled>
                <button class="edit-btn"><i class="fa-solid fa-pencil"></i></button>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </main>

  <!-- Script Links -->
  <script src="./scripts/inputSize.js"></script>
  <script src="./scripts/openAlternatives.js"></script>
  <script src="./scripts/editAlternatives.js"></script>
</body>
</html>