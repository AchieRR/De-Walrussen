<?php
// DeWalrus/Solliciteren.php — Vacatures + formulier
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Solliciteren</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Sollicitatie.css" />
</head>
<body class="theme-walrus-cream">

<?php require dirname(__DIR__) . '/nav.php'; ?>

  <div class="header-gap" aria-hidden="true"></div>

  <main class="page-content">
    <div class="page-title" aria-hidden="true">
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
      <h1 class="title-text">SCHOONMAAK</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
    </div>

 <?php $base = ''; include __DIR__ . '/_hero.inc.php'; ?>


  <div class="section-divider" aria-hidden="true"></div>

   <?php $base = ''; include __DIR__ . '/_form.inc.php'; ?>

<div class="section-divider" aria-hidden="true"></div>

<?php include __DIR__ . '/_footer.inc.html'; ?>
</body>
</html>
