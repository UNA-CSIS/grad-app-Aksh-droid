<?php
require __DIR__.'/helpers.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['accomp'] = trim($_POST['accomp'] ?? '');
}
$fullName = trim(($_SESSION['first'] ?? '').' '.($_SESSION['last'] ?? ''));
$taken    = $_SESSION['taken']  ?? [];
$courses  = offeredCourses();
$accomp   = $_SESSION['accomp'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Grad Application - Confirm</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;margin:40px;max-width:720px}
    .card{border:1px solid #ddd;padding:22px;border-radius:8px}
    pre{white-space:pre-wrap}
    .row{display:flex;gap:12px}
    button{padding:10px 16px}
  </style>
</head>
<body>
  <h2>Confirm Your Application</h2>
  <div class="card">
    <p><strong>Name:</strong> <?= e($fullName) ?></p>
    <p><strong>Courses selected (<?= count($taken) ?>/<?= count($courses) ?>):</strong></p>
    <ul>
      <?php foreach ($taken as $c): ?><li><?= e($c) ?></li><?php endforeach; ?>
      <?php if (!count($taken)): ?><li><em>No courses selected</em></li><?php endif; ?>
    </ul>
    <p><strong>Accomplishments:</strong></p>
    <pre><?= e($accomp) ?></pre>

    <form method="post" action="result.php" class="row">
      <button type="submit" name="confirm" value="1">Confirm & Submit</button>
      <a href="index.php"><button type="button">Start Over</button></a>
    </form>
  </div>
</body>
</html>
