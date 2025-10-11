<?php
session_start();
require __DIR__ . '/../db.php';

function bad($msg){ http_response_code(400); exit($msg); }
function e($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

if (empty($_POST['csrf']) || empty($_SESSION['csrf']) || !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  bad('Ongeldige sessie (CSRF).');
}
if (!empty($_POST['website'])) { bad('Ongeldige invoer.'); }

$required = ['voornaam','achternaam','locatie','onderwerp','bericht'];
foreach ($required as $f) {
  if (!isset($_POST[$f]) || trim($_POST[$f]) === '') bad("Ontbrekend veld: $f");
}

$voornaam   = trim($_POST['voornaam']);
$tussen     = ($_POST['tussenvoegsel'] ?? '') !== '' ? trim($_POST['tussenvoegsel']) : null;
$achternaam = trim($_POST['achternaam']);

$emailRaw = trim($_POST['email'] ?? '');
$telRaw   = trim($_POST['telefoon'] ?? '');

/* Minstens e-mail of telefoon verplicht */
if ($emailRaw === '' && $telRaw === '') {
  bad('Vul minimaal e-mail of telefoon in.');
}

/* Valideer conditioneel */
$email = null;
if ($emailRaw !== '') {
  $email = filter_var($emailRaw, FILTER_VALIDATE_EMAIL);
  if (!$email) bad('Ongeldig e-mailadres.');
}

$tel = null;
if ($telRaw !== '') {
  $tel = preg_replace('/\s+/', '', $telRaw);
  $tel = preg_replace('/^00/', '+', $tel);
  if (!preg_match('/^(0\d{9}|\+31\d{9})$/', $tel)) bad('Ongeldig telefoonnummer.');
}

$locatie = $_POST['locatie'];
if (!in_array($locatie, ['Leeuwarden','Sneek','Beide'], true)) bad('Ongeldige locatie.');

$onderwerp = trim($_POST['onderwerp']);
if (mb_strlen($onderwerp) > 200) bad('Onderwerp is te lang (max 200).');

$bericht = trim($_POST['bericht']);
if (mb_strlen($bericht) > 5000) bad('Bericht is te lang.');

/* INSERT (zonder user_agent/ip) */
$sql = "INSERT INTO contacts
  (voornaam,tussenvoegsel,achternaam,email,telefoon,locatie,onderwerp,bericht)
  VALUES
  (:voornaam,:tussen,:achternaam,:email,:telefoon,:locatie,:onderwerp,:bericht)";

/* Als je kolommen NOT NULL zijn, val terug op lege string */
$pdo->prepare($sql)->execute([
  ':voornaam'   => $voornaam,
  ':tussen'     => $tussen,
  ':achternaam' => $achternaam,
  ':email'      => $email ?? '',   // zet '' als je schema NOT NULL is
  ':telefoon'   => $tel   ?? '',   // idem
  ':locatie'    => $locatie,
  ':onderwerp'  => $onderwerp,
  ':bericht'    => $bericht,
]);

/* Mail */
$to = match ($locatie) {
  'Leeuwarden' => 'info@dewalrusleeuwarden.nl',
  'Sneek'      => 'info@dewalrussneek.nl',
  default      => 'info@dewalrusleeuwarden.nl, info@dewalrussneek.nl',
};
$subject = "Nieuw contactformulier — {$locatie}: {$onderwerp}";

$naam = $voornaam . ($tussen ? " $tussen" : "") . " $achternaam";
$lines = [
  "Nieuw bericht via de website:",
  "",
  "Naam: {$naam}",
  "E-mail: " . ($email ?: '—'),
  "Telefoon: " . ($tel   ?: '—'),
  "Locatie: {$locatie}",
  "Onderwerp: {$onderwerp}",
  "",
  "Bericht:",
  $bericht,
];
$body = wordwrap(implode("\r\n", $lines), 70);

$headers = [];
$headers[] = 'From: Grand Café De Walrus <no-reply@dewalrus.local>';
if ($email) { $headers[] = 'Reply-To: ' . $email; }
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/plain; charset=UTF-8';

@mail($to, $subject, $body, implode("\r\n", $headers));

$telDisplay = $tel;
if ($telDisplay && strpos($telDisplay, '+31') === 0) $telDisplay = '+31 ' . substr($telDisplay, 3);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Bedankt</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Bedankt.css" />
</head>
<body class="theme-walrus-cream">
  <?php require dirname(__DIR__) . '/nav.php'; ?>

  <div class="header-gap" aria-hidden="true"></div>

  <main class="page-content">
    <div class="page-title" aria-hidden="true">
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
      <h1 class="title-text">BEDANKT</h1>
      <img class="title-line" src="https://www.dewalrus.nl/websites/implementatie/website/images/line-title.png" alt="">
    </div>

    <div class="thankyou-card">
      <div class="thankyou-icon" aria-hidden="true">
        <svg viewBox="0 0 24 24" width="36" height="36" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"></path></svg>
      </div>

      <h2 class="thankyou-title">Bedankt voor je bericht, <?= e($naam) ?>!</h2>

      <p class="thankyou-intro">
        We hebben je bericht voor <strong><?= e($locatie) ?></strong> ontvangen met het onderwerp
        <strong><?= e($onderwerp) ?></strong>. We nemen zo snel mogelijk contact met je op.
        Vragen? Bel Leeuwarden <a href="tel:0582137740">058 213 7740</a> of Sneek <a href="tel:0515 438 100">0515 438 100</a>.
      </p>

      <div class="identity-row">
        <div><span class="k">Naam</span><span class="v"><?= e($naam) ?></span></div>
        <div><span class="k">E-mail</span><span class="v"><?= e($email ?: '—') ?></span></div>
        <div><span class="k">Telefoon</span><span class="v"><?= e($telDisplay ?: '—') ?></span></div>
      </div>

      <details class="more" open>
        <summary>Details</summary>
        <ul class="kv">
          <li><span class="k">Locatie:</span><span class="v"><?= e($locatie) ?></span></li>
          <li><span class="k">Onderwerp:</span><span class="v"><?= e($onderwerp) ?></span></li>
          <li style="grid-column:1/-1">
            <span class="k">Bericht:</span>
            <span class="v"><pre style="white-space:pre-wrap;margin:0"><?= e($bericht) ?></pre></span>
          </li>
        </ul>
      </details>

      <div class="cta-row center">
        <a class="btn btn-primary" href="../index.php">Terug naar homepage</a>
        <a class="btn btn-secondary" href="../Contact.php">Nieuw bericht sturen</a>
      </div>
    </div>
  </main>

  <?php include dirname(__DIR__) . '/_footer.inc.html'; ?>
</body>
</html>
