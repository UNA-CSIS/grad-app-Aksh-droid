<?php
require __DIR__.'/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['first'] = trim($_POST['first'] ?? '');
    $_SESSION['last']  = trim($_POST['last'] ?? '');
}
$fullName = trim(($_SESSION['first'] ?? '').' '.($_SESSION['last'] ?? ''));
$courses = offeredCourses();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Grad Application - Step 2</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;margin:40px;max-width:720px}
    .card{border:1px solid #ddd;padding:22px;border-radius:8px}
    ul{list-style:none;padding-left:0}
    li{margin:6px 0}
    button{padding:10px 16px}
  </style>
</head>
<body>
  <h2>Applicant: <?= e($fullName) ?></h2>
  <div class="card">
    <form method="post" action="accomplishments.php">
      <p>Select the courses you have completed:</p>
      <ul>
        <?php foreach ($courses as $i => $label): ?>
          <li>
            <label>
              <input type="checkbox" name="taken[]" value="<?= e($label) ?>">
              <?= e($label) ?>
            </label>
          </li>
        <?php endforeach; ?>
      </ul>
      <button type="submit">Continue</button>
    </form>
  </div>
</body>
</html>

