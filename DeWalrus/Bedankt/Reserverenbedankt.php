<?php
// DeWalrus/Bedankt/Reserverenbedankt.php
// Valideert reservering, schrijft naar DB, toont bevestiging.

session_start();
require __DIR__ . '/../db.php';

function bad($msg){ http_response_code(400); exit($msg); }
function e($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

// ---- CSRF
if (empty($_POST['csrf']) || empty($_SESSION['csrf']) || !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  bad('Ongeldige sessie (CSRF).');
}

// ---- Honeypot
if (!empty($_POST['website'])) {
  // Bot gespot
  bad('Ongeldige invoer.');
}

// ---- verplichte velden
$required = ['voornaam','achternaam','email','telefoon','locatie','type','date','guests','time'];
foreach ($required as $f) {
  if (!isset($_POST[$f]) || $_POST[$f] === '') bad("Ontbrekend veld: $f");
}

// ---- normaliseren + validaties
$voornaam   = trim($_POST['voornaam']);
$tussen     = ($_POST['tussenvoegsel'] ?? '') !== '' ? trim($_POST['tussenvoegsel']) : null;
$achternaam = trim($_POST['achternaam']);

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if (!$email) bad('Ongeldig e-mailadres.');

$tel = preg_replace('/\s+/', '', $_POST['telefoon']);
$tel = preg_replace('/^00/', '+', $tel); // 0031 -> +31
if (!preg_match('/^(0\d{9}|\+31\d{9})$/', $tel)) bad('Ongeldig telefoonnummer.');

$locaties = ['Leeuwarden','Sneek'];
$locatie  = $_POST['locatie'];
if (!in_array($locatie, $locaties, true)) bad('Ongeldige locatie.');

$types = [
  'High wine','High tea','Borrel Boot','Walking Diner Buffet','Live Cooking Buffet',
  'Bier Arrangement','Bioscoop Arrangement','Theater Sneek Arrangement','Vergadering',
  'Workshop','Evenement','Diner','Lunch'
];
$type = $_POST['type'];
if (!in_array($type, $types, true)) bad('Ongeldig type reservering.');

$date = $_POST['date']; // YYYY-MM-DD
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) bad('Ongeldige datum.');
$today = new DateTime('today');
$dObj  = DateTime::createFromFormat('Y-m-d', $date);
if (!$dObj) bad('Ongeldige datum.');
$max   = (clone $today)->modify('+365 days');
if ($dObj < $today) bad('Datum kan niet in het verleden.');
if ($dObj > $max)   bad('Datum te ver in de toekomst.');

$time = $_POST['time']; // HH:MM
if (!preg_match('/^(?:[01]\d|2[0-3]):[0-5]\d$/', $time)) bad('Ongeldige tijd.');

$guests = filter_var($_POST['guests'], FILTER_VALIDATE_INT, ['options'=>['min_range'=>1,'max_range'=>15]]);
if ($guests === false) bad('Aantal gasten moet tussen 1 en 15 zijn.');

// ---- INSERT
$sql = "INSERT INTO reservations
  (voornaam, tussenvoegsel, achternaam, email, telefoon,
   locatie, type, reservation_date, reservation_time, guests,
   user_agent, ip_address)
  VALUES
  (:voornaam,:tussen,:achternaam,:email,:telefoon,
   :locatie,:type,:rdate,:rtime,:guests,
   :ua, INET6_ATON(:ip))";

$pdo->prepare($sql)->execute([
  ':voornaam'   => $voornaam,
  ':tussen'     => $tussen,
  ':achternaam' => $achternaam,
  ':email'      => $email,
  ':telefoon'   => $tel,
  ':locatie'    => $locatie,
  ':type'       => $type,
  ':rdate'      => $date,
  ':rtime'      => $time . ':00',
  ':guests'     => $guests,
  ':ua'         => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255),
  ':ip'         => $_SERVER['REMOTE_ADDR'] ?? null,
]);

// ---- weergave helpers
$naamParts = [$voornaam];
if ($tussen) $naamParts[] = $tussen;
$naamParts[] = $achternaam;
$naamVol = implode(' ', $naamParts);

$telDisplay = $tel;
if (strpos($telDisplay, '+31') === 0) $telDisplay = '+31 ' . substr($telDisplay, 3);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>De Walrus — Bedankt</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="Bedankt.css" />
</head>
<body class="theme-walrus-cream">
 <?php
  $BASE = '/'; 
  require dirname(__DIR__) . '/nav.php';
?>
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

      <h2 class="thankyou-title">Bedankt voor je reservering, <?= e($naamVol) ?>!</h2>

      <p class="thankyou-intro">
        We hebben je verzoek ontvangen voor <strong><?= e($locatie) ?></strong> op
        <strong><?= e($date) ?></strong> om <strong><?= e($time) ?></strong> voor
        <strong><?= e($guests) ?></strong> personen. Je hoort snel van ons.
        Vragen? Bel Leeuwarden <a href="tel:0582137740">058 213 7740</a> of Sneek <a href="tel:0515438100">0515 438 100</a>.
      </p>

      <div class="identity-row">
        <div><span class="k">Naam</span><span class="v"><?= e($naamVol) ?></span></div>
        <div><span class="k">E-mail</span><span class="v"><?= e($email) ?></span></div>
        <div><span class="k">Telefoon</span><span class="v"><?= e($telDisplay) ?></span></div>
      </div>

      <details class="more">
        <summary>Details reservering</summary>
        <ul class="kv">
          <li><span class="k">Locatie:</span><span class="v"><?= e($locatie) ?></span></li>
          <li><span class="k">Type:</span><span class="v"><?= e($type) ?></span></li>
          <li><span class="k">Datum:</span><span class="v"><?= e($date) ?></span></li>
          <li><span class="k">Tijd:</span><span class="v"><?= e($time) ?></span></li>
          <li><span class="k">Aantal gasten:</span><span class="v"><?= e($guests) ?></span></li>
        </ul>
      </details>

      <div class="cta-row center">
        <a class="btn btn-primary" href="../index.php">Terug naar homepage</a>
        <a class="btn btn-secondary" href="../Reserveren.php">Nieuwe reservering</a>
      </div>
    </div>
  </main>

  <!-- Footer (zelfde stijl als overige pagina’s) -->
  <footer class="infobar">
    <div class="infobar-top-text">Kom langs of bel ons — Bekijk onze socials</div>
    <div class="info-content">
      <div class="info-section">
        <h4>De Walrus Leeuwarden</h4>
        <p>
          <a href="https://www.google.com/maps/place/Grand+Caf%C3%A9+De+Walrus+-+Leeuwarden" target="_blank" rel="noopener">
            Gouverneursplein 37<br>8911 HH Leeuwarden
          </a><br><br>
          Zondag t/m Zaterdag van 10:00 tot 01:00<br><br>
          <strong>Tel:</strong> <a href="tel:0582137740">058-2137740</a><br>
          <strong>E-mail:</strong> <a href="mailto:info@dewalrusleeuwarden.nl">info@dewalrusleeuwarden.nl</a>
        </p>
        <div class="socials">
          <a href="https://www.facebook.com/DeWalrusLeeuwarden/?locale=nl_NL" target="_blank" rel="noopener">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" class="social-icon" alt="">
          </a>
          <a href="https://www.instagram.com/dewalrusleeuwarden/" target="_blank" rel="noopener">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" class="social-icon" alt="">
          </a>
        </div>
      </div>

      <div class="info-section">
        <h4>De Walrus Sneek</h4>
        <p>
          <a href="https://www.google.com/maps/place/Grand+Caf%C3%A9+De+Walrus+-+Sneek" target="_blank" rel="noopener">
            Leeuwenburg 11<br>8601 CG Sneek
          </a><br><br>
          Zondag t/m Zaterdag van 10:00 tot 01:00<br><br>
          <strong>Tel:</strong> <a href="tel:0515438100">0515-438100</a><br>
          <strong>E-mail:</strong> <a href="mailto:info@dewalrussneek.nl">info@dewalrussneek.nl</a>
        </p>
        <div class="socials">
          <a href="https://www.facebook.com/DeWalrusSneek/?locale=nl_NL" target="_blank" rel="noopener">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" class="social-icon" alt="">
          </a>
          <a href="https://www.instagram.com/dewalrussneek/" target="_blank" rel="noopener">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" class="social-icon" alt="">
          </a>
        </div>
      </div>

      <div class="infobar-brand">
        <span class="walrus">De Walrus</span>
        <span class="grandcafe">— GRAND CAFÉ —</span>
      </div>
    </div>
  </footer>
</body>
</html>
