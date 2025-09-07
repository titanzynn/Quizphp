<?php
session_start();
require_once 'perguntas.php';

$pontuacao = $_SESSION['pontuacao'] ?? 0;
$total = count($perguntas);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Resultado Final</title>
  <link rel="stylesheet" href="quiz.css">
</head>
<body>
  <div class="quiz-container">
    <h2>Quiz Concluído!</h2>
    <p>Sua pontuação final é: <strong><?= $pontuacao ?></strong> de <?= $total ?></p>
    <a href="index.php" class="btn-reiniciar">Tentar Novamente</a>
  </div>
</body>
</html>
