<?php
// DeWalrus/Bedankt/Contactbedankt.php
// Valideert contact, schrijft naar DB, mailt, toont bevestiging.

session_start();
require __DIR__ . '/../db.php';

function bad($msg){ http_response_code(400); exit($msg); }
function e($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

if (empty($_POST['csrf']) || empty($_SESSION['csrf']) || !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  bad('Ongeldige sessie (CSRF).');
}
if (!empty($_POST['website'])) { bad('Ongeldige invoer.'); }

$required = ['voornaam','achternaam','email','telefoon','locatie','onderwerp','bericht'];
foreach ($required as $f) {
  if (!isset($_POST[$f]) || trim($_POST[$f]) === '') bad("Ontbrekend veld: $f");
}

$voornaam   = trim($_POST['voornaam']);
$tussen     = ($_POST['tussenvoegsel'] ?? '') !== '' ? trim($_POST['tussenvoegsel']) : null;
$achternaam = trim($_POST['achternaam']);

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if (!$email) bad('Ongeldig e-mailadres.');

$tel = preg_replace('/\s+/', '', $_POST['telefoon']);
$tel = preg_replace('/^00/', '+', $tel);
if (!preg_match('/^(0\d{9}|\+31\d{9})$/', $tel)) bad('Ongeldig telefoonnummer.');

$locatie = $_POST['locatie'];
if (!in_array($locatie, ['Leeuwarden','Sneek','Beide'], true)) bad('Ongeldige locatie.');

$onderwerp = trim($_POST['onderwerp']);
if (mb_strlen($onderwerp) > 200) bad('Onderwerp is te lang (max 200).');

$bericht = trim($_POST['bericht']);
if (mb_strlen($bericht) > 5000) bad('Bericht is te lang.');

$sql = "INSERT INTO contacts
  (voornaam,tussenvoegsel,achternaam,email,telefoon,locatie,onderwerp,bericht,user_agent,ip_address)
  VALUES
  (:voornaam,:tussen,:achternaam,:email,:telefoon,:locatie,:onderwerp,:bericht,:ua,INET6_ATON(:ip))";

$pdo->prepare($sql)->execute([
  ':voornaam'   => $voornaam,
  ':tussen'     => $tussen,
  ':achternaam' => $achternaam,
  ':email'      => $email,
  ':telefoon'   => $tel,
  ':locatie'    => $locatie,
  ':onderwerp'  => $onderwerp,
  ':bericht'    => $bericht,
  ':ua'         => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255),
  ':ip'         => $_SERVER['REMOTE_ADDR'] ?? null,
]);

// ---- Mail
$to = match ($locatie) {
  'Leeuwarden' => 'info@dewalrusleeuwarden.nl',
  'Sneek'      => 'info@dewalrussneek.nl',
  default      => 'info@dewalrusleeuwarden.nl, info@dewalrussneek.nl',
};

$subject = "Nieuw contactformulier — {$locatie}: {$onderwerp}";

$lines = [
  "Nieuw bericht via de website:",
  "",
  "Naam: {$voornaam}" . ($tussen ? " {$tussen}" : "") . " {$achternaam}",
  "E-mail: {$email}",
  "Telefoon: {$tel}",
  "Locatie: {$locatie}",
  "Onderwerp: {$onderwerp}",
  "",
  "Bericht:",
  $bericht,
  "",
  "--",
  "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'onbekend'),
  "UA: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'onbekend'),
];
$body = wordwrap(implode("\r\n", $lines), 70);

$headers = [];
$headers[] = 'From: Grand Café De Walrus <no-reply@dewalrus.local>';
$headers[] = 'Reply-To: ' . $email;
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/plain; charset=UTF-8';

@mail($to, $subject, $body, implode("\r\n", $headers));

// ---- Weergave
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
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@600&family=Alex+Brush&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Bedankt.css" />
</head>
<body class="theme-walrus-cream">
  <header>
    <nav class="topnav" role="navigation" aria-label="Hoofdmenu">
      <div class="nav-left">
        <a href="../Solliciteren.php" class="nav-btn btn-solliciteren">Solliciteren</a>
        <a href="../Menukaart.php" class="nav-btn">Menukaart</a>
        <a href="../Arrangements.php" class="nav-btn">Arrangementen</a>
      </div>

      <a href="../index.php" class="logo" aria-label="De Walrus Homepage">
        <span class="walrus">De Walrus</span>
        <span class="grandcafe">— GRAND CAFÉ —</span>
      </a>

      <div class="nav-right">
        <a href="../Zakelijk.php" class="nav-btn">Zakelijk</a>
        <a href="../Contact.php" class="nav-btn">Contact</a>
        <a href="../Reserveren.php" class="nav-btn btn-reserveren">Reserveren</a>
      </div>
    </nav>
  </header>
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

      <h2 class="thankyou-title">Bedankt voor je bericht, <?= e($naamVol) ?>!</h2>

      <p class="thankyou-intro">
        We hebben je bericht voor <strong><?= e($locatie) ?></strong> ontvangen met het onderwerp
        <strong><?= e($onderwerp) ?></strong>. We nemen zo snel mogelijk contact met je op.
        Vragen? Bel Leeuwarden <a href="tel:0582137740">058 213 7740</a> of Sneek <a href="tel:0515 438 100">0515 438 100</a>.
      </p>

      <div class="identity-row">
        <div><span class="k">Naam</span><span class="v"><?= e($naamVol) ?></span></div>
        <div><span class="k">E-mail</span><span class="v"><?= e($email) ?></span></div>
        <div><span class="k">Telefoon</span><span class="v"><?= e($telDisplay) ?></span></div>
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
