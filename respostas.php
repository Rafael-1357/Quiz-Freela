<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS -->
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/respostas.css">

  <!-- Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

</head>
<body>

  <header>
    <div id="headerContainer">
      <div id="logo">LOGO</div>
      <div id="headerLinks">
        <a href="#">Perguntas</a>
        <a href="#" class="selected">Respostas</a>
      </div>
    </div>
  </header>

  <main>
    <div id="mainContainer">
      <h1>Respostas</h1>
      <p>Informações de pessoas que fizeram o quiz, a nota é o somatório do peso das perguntas.</p>
      <div id="tabela">
        <div id="resposta">
          <p>Respostas</p>
        </div>
        <div class="swiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <?php
              include 'BDConection.php';
              $mysqli = conectarBD();
              $query_select = $mysqli->query('SELECT * FROM form');
              
              function criarLinhas($tipoDeLinha, $campos) {
                $linha = '<tr>';
                
                foreach($campos as $dado) {
                  $linha .= "<$tipoDeLinha>$dado</$tipoDeLinha>";
                }

                $linha .= '</tr>';

                return $linha;
              }

              function criarTHead() {
                $cabecalho = '<thead>';
                $cabecalho .= criarLinhas('th', array('Nome', 'Telefone', 'Raça', 'Nota', 'Probabilidade'));
                $cabecalho .= '</thead>';
                return $cabecalho;
              }

              function criarTBody($linhas) {
                $corpo = '<tbody>';

                foreach($linhas as $campos) {
                  $corpo .= criarLinhas('td', $campos);
                }

                $corpo .= '</tbody>';
                return $corpo;
              }

              function criarTabela($linhas) {
                $tabela = '<table>';
                $tabela .= criarTHead();
                $tabela .= criarTBody($linhas);
                $tabela .= '</table>';
                return $tabela;
              }

              function descobrirProbabilidade($pontuacao) {
                $probabilidade = 'baixa';

                if($pontuacao > 3) {
                  $probabilidade = 'pouca'; 
                } elseif($pontuacao > 6) {
                  $probabilidade = 'alta';
                }

                return $probabilidade;
              }

              function paginarDados($query_select) {
                $matrizDados = array();
                $pag = 0;
                $index = 0;
                $limiteLinhasPorPag = 8;

                while($campos = $query_select->fetch_array(MYSQLI_ASSOC)) {
                  $probabilidade = descobrirProbabilidade($campos['pontuacao']);
                  $matrizDados[$pag][$index] = array($campos['nome'], $campos['telefone'], $campos['raca'], $campos['pontuacao'], "<div class='$probabilidade'></div>");
                  $index++;
                  
                  if($index === $limiteLinhasPorPag) {
                    $index = 0;
                    $pag++;
                  }
                }

                return $matrizDados;
              }
              
              $slides = '';
              $matrizDados = paginarDados($query_select);

              foreach($matrizDados as $pag) {
                $slides .= "<div class='swiper-slide'>";
                $slides .= criarTabela($pag);
                $slides .= "</div>";
              }

              echo $slides;
            ?>
          </div>
        </div>
        <div id="paginas">
          <button class="prev"><i class="fa-solid fa-angle-up" style="color: #a0a0a0;"></i></button>
          <input type="text" name="" id="numPag" value="1" disabled>
          <button class="next"><i class="fa-solid fa-angle-up" style="color: #a0a0a0;"></i></button>
        </div>
      </div>
    </div>
  </main>

  <!-- Swiper Link -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="./scripts/paginacaoRespostas.js"></script>
</body>
</html>