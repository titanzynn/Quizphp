<?php
session_start();
require_once 'perguntas.php';

// Inicializa progresso
if (!isset($_SESSION['pontuacao'])) {
    $_SESSION['pontuacao'] = 0;
    $_SESSION['pergunta_atual'] = 0;
}

// Se já respondeu, processa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $indice = $_SESSION['pergunta_atual'];
    $resposta_usuario = $_POST['resposta'];
    $resposta_correta = $perguntas[$indice]['resposta'];

    if ($resposta_usuario === $resposta_correta) {
        $_SESSION['pontuacao']++;
        $_SESSION['feedback'] = '<p class="correto">Resposta correta!</p>';
    } else {
        $_SESSION['feedback'] = '<p class="incorreto">Resposta incorreta! A resposta correta era: <strong>' 
                              . htmlspecialchars($resposta_correta) . '</strong></p>';
    }

    $_SESSION['pergunta_atual']++;

    if ($_SESSION['pergunta_atual'] >= count($perguntas)) {
        header("Location: final.php");
    } else {
        header("Location: feedback.php");
    }
    exit();
}

// Pergunta atual
$indice = $_SESSION['pergunta_atual'];
$pergunta_atual = $perguntas[$indice];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Pergunta <?= $indice+1 ?></title>
  <link rel="stylesheet" href="quiz.css">
</head>
<body>
  <div class="quiz-container">
    <h2>Pergunta <?= $indice+1 ?> de <?= count($perguntas) ?></h2>
    <h3><?= htmlspecialchars($pergunta_atual['pergunta']) ?></h3>

    <form action="quiz.php" method="post">
      <ul class="opcoes">
        <?php foreach ($pergunta_atual['opcoes'] as $opcao): ?>
          <li>
            <label>
              <input type="radio" name="resposta" value="<?= htmlspecialchars($opcao) ?>" required>
              <?= htmlspecialchars($opcao) ?>
            </label>
          </li>
        <?php endforeach; ?>
      </ul>
      <button type="submit" class="btn-enviar">Enviar Resposta</button>
    </form>
  </div>
</body>
</html>
