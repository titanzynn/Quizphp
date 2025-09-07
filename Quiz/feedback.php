<?php
session_start();
if (!isset($_SESSION['feedback'])) {
    header("Location: quiz.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Feedback</title>
  <link rel="stylesheet" href="quiz.css">
</head>
<body>
  <div class="quiz-container">
    <h2>Resultado</h2>
    <?= $_SESSION['feedback'] ?>
    <a href="quiz.php" class="btn-proximo">Próxima Pergunta</a>
  </div>
</body>
</html>
