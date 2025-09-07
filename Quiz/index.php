<?php
session_start();
session_destroy(); // Sempre reinicia ao voltar para o início
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Quiz PHP - Início</title>
  <link rel="stylesheet" href="quiz.css">
</head>
<body>
  <div class="quiz-container">
    <h1>Mini Quiz Back-End</h1>
    <h2>Bem-vindo(a)!</h2>
    <p>Teste seus conhecimentos em PHP com 10 perguntas.</p>
    <a href="quiz.php" class="btn-iniciar">Começar o Quiz</a>
  </div>
</body>
</html>
