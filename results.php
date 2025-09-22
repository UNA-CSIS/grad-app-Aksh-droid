<?php
require __DIR__.'/helpers.php';

$first   = $_SESSION['first']  ?? '';
$last    = $_SESSION['last']   ?? '';
$taken   = $_SESSION['taken']  ?? [];
$accomp  = $_SESSION['accomp'] ?? '';
$total   = count(offeredCourses());
$takenCt = count($taken);

$accepted = evaluateApplication($accomp, $total, $takenCt);
$fullName = trim("$first $last");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Grad Application - Result</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;margin:40px;max-width:720px;text-align:center}
    .badge{display:inline-block;padding:14px 18px;border-radius:10px;margin-top:10px}
    .ok{background:#e8f7e8;color:#145a14;border:1px solid #c8e8c8}
    .no{background:#fde9e9;color:#7a1010;border:1px solid #f3caca}
    a{display:inline-block;margin-top:16px}
  </style>
</head>
<body>
  <h2>Thank you, <?= e($fullName) ?>!</h2>

  <?php if ($accepted): ?>
    <div class="badge ok"><strong>✅ You are accepted for a phone interview.</strong></div>
  <?php else: ?>
    <div class="badge no"><strong>❌ Sorry, your application was rejected.</strong></div>
  <?php endif; ?>

  <p><small>
    Decision logic: keyword “PHP” found = <?= e(stripos($accomp,'php')!==false ? 'yes':'no') ?>;
    courses taken = <?= $takenCt ?>/<?= $total ?> (<?= number_format($total?($takenCt/$total*100):0,1) ?>%).
  </small></p>

  <a href="index.php">Start a new application</a>
</body>
</html>
