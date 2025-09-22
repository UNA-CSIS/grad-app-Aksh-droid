<?php
require __DIR__.'/helpers.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['taken'] = isset($_POST['taken']) ? array_values((array)$_POST['taken']) : [];
}
$fullName = trim(($_SESSION['first'] ?? '').' '.($_SESSION['last'] ?? ''));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Grad Application - Step 3</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;margin:40px;max-width:720px}
    .card{border:1px solid #ddd;padding:22px;border-radius:8px}
    textarea{width:100%;height:200px;padding:10px}
    button{padding:10px 16px}
  </style>
</head>
<body>
  <h2>Applicant: <?= e($fullName) ?></h2>
  <div class="card">
    <form method="post" action="confirm.php">
      <p>Personal accomplishments (mention tools/tech you’ve used):</p>
      <textarea name="accomp" required placeholder="Example: Built APIs in PHP & MySQL…"></textarea>
      <button type="submit">Continue</button>
    </form>
  </div>
</body>
</html>
